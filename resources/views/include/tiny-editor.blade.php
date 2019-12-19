{{--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>--}}
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

{{--<script>tinymce.init({selector:'textarea'});</script>--}}
<script>
    var editor_config = {
        path_absolute : "/",
        selector: ".form-group textarea",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        }
    };

    tinymce.init(editor_config);
</script>



{{--<script src="https://cdn.tiny.cloud/1/7vm23spbzr3ns315zbj41a5usy1w7cyn220cnckzus5jvhu6/tinymce/5/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'a11ychecker advcode casechange formatpainter linkchecker lists checklist media mediaembed pageembed permanentpen powerpaste tinycomments tinydrive tinymcespellchecker',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter insertfile pageembed permanentpen',
        toolbar_drawer: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name'
    });



</script>--}}