<script>
    function confirmDelete(form, message) {
        if (confirm(message)) {
            $(form).submit();
        }
    }

</script>
