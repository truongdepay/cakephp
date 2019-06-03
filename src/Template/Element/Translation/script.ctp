<script>
    function saveData(elm) {
        let inputName = $(elm).data('from');
        let inputFull = "textarea[name="+inputName+"]";
        let content = $(inputFull).val();
        content = replaceBreak(content);
        console.log(content);
    }

    function replaceBreak(content) {
        let val = content.replace(/\n/gi,"<br\/>");
        val = val.split(" ");
        return val;
    }
</script>