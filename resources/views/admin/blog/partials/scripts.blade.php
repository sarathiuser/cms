<script>
// (function() {
//     $('#published_at').datetimepicker();
//     document.getElementById('title').addEventListener('blur', function(e) {
//         let slug = document.getElementById('slug');
// 
//         if(slug.value) {
//             return;
//         }
// 
//         slug.value = this.value
//         .toLowerCase()
//         .replace(/[^a-z0-9-]+/g, '-')
//         .replace(/^-+|-+$/g, '');
//     });
// })();

   setTimeout(function() {
      console.log($);
      $('#published_at').datetimepicker();
   }, 5000);
</script>