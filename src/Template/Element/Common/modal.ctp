<style>
    .popup-loading {
        min-width: 100%;
        min-height: 100%;
        position: fixed;
        z-index: 100;
        top: 0px;
        background: #00000040;
        display: none;
    }
    .popup-loading .content
    {
        text-align: center;
        margin-top: 20%;
    }
</style>
<div class="popup-loading">
    <div class="content">
        <div class="spinner-border text-light" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</div>