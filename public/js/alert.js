document.addEventListener('DOMContentLoaded',function(){
    const successmessage = document.querySelector('meta[name="success-message"]')
    if(successmessage){
    Swal.fire({
                icon:'success',
                title:'موفق',
                text:successmessage.content,
                timer:3000,
                showConfirmButton:false
            })
    }
})
document.addEventListener('DOMContentLoaded',function(){
document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click',function(e){
            e.preventDefault();
            const userId = this.dataset.id;
            Swal.fire({
                title: "آیا مطمئن هستید؟",
                text: "این عملیات قابل بازگشت نیست.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'بله حذف کن',
                cancelButtonText: 'لغو',
            }) .then((result)=>{
                if(result.isConfirmed){
                    fetch(`/users/${userId}`,{
                        method:'DELETE',
                        headers: {
                            'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept':'application/json'
                        }
                    })
                    .then(response =>{
                        if(response.ok){
                            document.getElementById(`user-row-${userId}`).remove();
                            Swal.fire('اطالاعات با موفقیت حذف شد','حذف شد!','success');
                        } else {
                            Swal.fire('عملیات با خطا مواجه شد','خطا!','error');
                        }
                    })
                    // document.getElementById('delete-form-' + userId).submit();
                }
            })
        })
    });
})
document.addEventListener('DOMContentLoaded', function() {
    const deleteBtn = document.getElementById('delete-account-btn');
    
    if (deleteBtn) {
        deleteBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            Swal.fire({
                title: 'حذف حساب کاربری',
                text: 'آیا مطمئن هستید؟ این عمل غیرقابل بازگشت است!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'بله، حذف کن',
                cancelButtonText: 'انصراف',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('/account/delete', {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        credentials: 'include'
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('خطا در حذف حساب');
                        }
                        return response.json();
                    })
                    .then(data => {
                        Swal.fire({
                            title: 'حذف شد!',
                            text: data.message,
                            icon: 'success'
                        }).then(() => {
                            window.location.href = '/'; // انتقال به صفحه اصلی
                        });
                    })
                    .catch(error => {
                        Swal.fire('خطا!', error.message, 'error');
                    });
                }
            });
        });
    }
});
