<script>
    //constant
    const TEXT = $("#content span");
    const CONTENT = $("#content");

    //Event
    TEXT.click(function () {
        let text = $(this).text();
        if ($(this).hasClass('text-selected')) {
            text = '';
        }
        $(this).toggleClass('bg-warning');
        $(this).toggleClass('text-selected');
        $(this).addClass('clicked');
        let url = '<?= $this->Url->build([
            'controller' => 'Translation',
            'action' => 'translate'
        ]) ?>';
        let id = '<?= $this->request->getQuery("id"); ?>';
        let csrfToken = '<?= $this->request->getParam('_csrfToken') ?>';
        let data = {text: text};
        $.ajax({
            headers: {
                'X-CSRF-Token': csrfToken
            },
            url: url,
            type: 'post',
            data: data,
            dataType: 'json',
            beforeSend: function () {
                showPopupLoading();
            },
            success: function (res) {
                closePopup();
                let clickClass = '.clicked';
                if ($(clickClass).hasClass('text-selected')) {
                    $(clickClass).append("<text class='display-text'>" + res.detail.text + "</text>");
                    $(clickClass).removeClass('clicked');
                } else {
                    $(clickClass).find('.display-text').remove();
                    $(clickClass).removeClass('clicked');
                }
                let content = CONTENT.html();
                $.ajax({
                    headers: {
                        'X-CSRF-Token': csrfToken
                    },
                    url : '<?= $this->Url->build(['controller' => 'Translation', 'action' => 'update', '?' => ['id' => $this->request->getQuery('id')]]) ?>',
                    type : 'post',
                    data : {content : content, token : res.detail.token},
                    dataType : 'json',
                    beforeSend : function() {
                        showPopupLoading();
                    },
                    success: function (res) {
                        closePopup();
                    }
                });
            }
        });
    });
</script>