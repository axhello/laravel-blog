<div id="disqus_thread"></div>
<script>
     var disqus_config = function () {
         this.page.url = '{{ url('/article') }}/{{ $slug }}';
         this.page.identifier = 'article-{{ $slug }}';
     };
    (function() { // DON'T EDIT BELOW THIS LINE
        var script = document.createElement('script');
        script.async = true;
        script.src = '//ciyuanai.disqus.com/embed.js';
        script.setAttribute('data-timestamp', + new Date());
        (document.head || document.body).appendChild(script);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>