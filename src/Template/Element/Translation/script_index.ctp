<script>
    let msg = {
        common_loading : '<?= __('common.loading'); ?>',
        common_content_null : '<?= __('common.content_null'); ?>',
    };
    function saveData(elm) {
        let inputName = $(elm).data('from');
        let inputFull = "textarea[name="+inputName+"]";
        let content = $(inputFull).val();
        if (content !== '') {
            content = replaceBreak(content);
            let url = '<?= $this->Url->build([
                'controller' => 'Translation',
                'action' => 'save'
            ]); ?>';
            let csrfToken = '<?= $this->request->getParam('_csrfToken'); ?>';
            let data = {'content' : content, '_csrfToken' : csrfToken};
            $.ajax({
                headers: {
                    'X-CSRF-Token': csrfToken
                },
                url: url,
                type : 'post',
                data : data,
                dataType : 'json',
                beforeSend : function() {
                    showPopupLoading();
                },
                success : function (res) {
                    closePopup();
                    if (res.result === 1) {
                        window.location = '<?= $this->Url->build([
                            'controller' => 'Translation',
                            'action' => 'view'
                        ]); ?>?id=' + res.detail.id + '&token=' + res.detail.token;
                    }
                }
            });
        } else {
            alert(msg.common_content_null);
        }
    }

    function replaceBreak(content)
    {
        let val = content.replace(/\n/gi,"<br>");
        val = "<span>" + val;
        val =val + "</span>";
        val = val.replace(/ /gi, "</span> <span>");
        val = val.replace(/<br>/gi, "</span><br><span>");
        return val;
    }

</script>