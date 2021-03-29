require('./bootstrap');
import Swal from 'sweetalert2'

window.deleteConfirm = function(formid){
    
    Swal.fire({
      title: 'Etes-vour sûr de vouloir effectuer cette action ?',
      showDenyButton: true,
      confirmButtonText: `Supprimer`,
      denyButtonText: `Annuler`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        
        console.log(formid);
        document.getElementById(formid).submit();

      } 
    })
}
