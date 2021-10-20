const delete_form=document.querySelectorAll('.delete-form');
delete_form.forEach(btn=>{
    btn.addEventListener('submit',function(e){
     e.preventDefault();
     const conf=confirm('Sei sicuro di voler cancellare definitivamente?');
     if (conf) this.submit();

   })
});

