<script>
    //constant
    const TEXT = $("#content span");
    const CONTENT = $("#content");

    //Event
    TEXT.click(function () {
        let text = $(this).text();
        $(this).toggleClass('bg-warning');
        $(this).toggleClass('text-selected');
        $(this).addClass('clicked');

        let content = CONTENT.html();

        let url = '<?= $this->Url->build([
                'controller' => 'Translation',
            'action' => 'update',
            '?' => ['id' => $this->request->getQuery('id')]
        ]) ?>';
        let id = '<?= $this->request->getQuery("id"); ?>';
        let csrfToken = '<?= $this->request->getParam('_csrfToken') ?>';
        let data = {content:content, _csrfToken:csrfToken};
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
                    $(clickClass).append("<text class='display-text'>Đường băng</text>");
                    $(clickClass).removeClass('clicked');
                } else {
                    $(clickClass).find('.display-text').remove();
                    $(clickClass).removeClass('clicked');
                }
            }
        })
    });
</script>