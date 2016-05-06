<link rel="stylesheet" href="{{ asset('plugin/editor/css/codemirror.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugin/editor/css/t-n-e.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugin/editor/css/pygment_trac.css') }}">
<link rel="stylesheet" href="{{ asset('plugin/editor/css/editor.css') }}">
<script type="text/javascript" src="{{ asset('plugin/editor/js/marked.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugin/editor/js/highlight.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugin/editor/js/codemirror.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugin/editor/js/ZeroClipboard.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('plugin/editor/js/highlight.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugin/editor/js/modal.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugin/editor/js/MIDI.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugin/editor/js/fileupload.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugin/editor/js/bacheditor.js') }}"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function() {
        var url = "{{ url(config('editor.uploadUrl')) }}";
        var myEditor = new Editor(url);
        myEditor.render('#Editor');
    });
</script>

<style>
    .editor{  width:{{ config('editor.width') }};  }
    .CodeMirror.form-control { border-radius: 0!important; }
    .editor-help{ display: none!important; }
    .editor-preview {  padding: 10px!important;  }
    .widget-highlight--line {display: none!important;}
</style>