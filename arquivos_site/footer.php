</main>
<footer class="footer fixed-bottom" id="footer" style="display: none;">

  <br>
  <div class="text-center align-text-middle" style="padding: 15px 0; margin-bottom: 0; background-color: #ee8f54; color: white">
    &copy; <em>2023 - Curso de PHP Fatec de Presidente Prudente/SP</em><br />
   
  </div>
</footer>
</div>
<embed src="" type="">
<script src='./bootstrap-5.3.0-alpha3-dist/js/bootstrap.bundle.min.js'> </script>
<script>
  window.addEventListener('scroll', function() {
  var footer = document.getElementById('footer');
  var content = document.querySelector('.main-content');

  function showFooter() {
    var scrollPosition = window.innerHeight + window.pageYOffset;
    var contentHeight = content.offsetHeight + content.offsetTop;

    if (scrollPosition >= contentHeight) {
      footer.style.display = 'block';
    } else {
      footer.style.display = 'none';
    }
  }

  showFooter();

  window.addEventListener('resize', showFooter);
});
</script>
</body>

</html>