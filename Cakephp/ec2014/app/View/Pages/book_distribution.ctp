<script>
    var path = window.location.pathname;
    console.log(path);
    path = path.split('/pages');
    console.log(path);
    window.open("http://localhost"+path[0]+"/help/BookDistributionForm.pdf");
</script>