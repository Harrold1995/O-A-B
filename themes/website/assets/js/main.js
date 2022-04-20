$(window).on('load', function(){
    // LOADER
    $("#loader").fadeOut(500);
    $("body > .wrapper").fadeIn(500);
});


$(document).ready(function(){
    $('.btn-download, .img-download').on('click', function(e){
        e.preventDefault();
        // alert($(this).attr('href'))

        SaveToDisk($(this).attr('href'),$(this).attr('title'))

    });

    /**
     * Force the download to disk instead open in a new tab
     * @param fileURL
     * @param fileName
     * @constructor
     */
    function SaveToDisk(fileURL, fileName) {
        // for non-IE
        if (!window.ActiveXObject) {
            var save = document.createElement('a');
            save.href = fileURL;
            save.target = '_blank';
            save.download = fileName || 'unknown';

            var evt = new MouseEvent('click', {
                'view': window,
                'bubbles': true,
                'cancelable': false
            });
            save.dispatchEvent(evt);

            (window.URL || window.webkitURL).revokeObjectURL(save.href);
        }

        // for IE < 11
        else if ( !! window.ActiveXObject && document.execCommand)     {
            var _window = window.open(fileURL, '_blank');
            _window.document.close();
            _window.document.execCommand('SaveAs', true, fileName || fileURL)
            _window.close();
        }
    }
})