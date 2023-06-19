</main>
<footer>
  <br>
  <div class="text-center align-text-middle" style="padding: 15px 0; margin-bottom: 0; background-color: #ee8f54; color: white">
    &copy; <em>2023 - Curso de PHP Fatec de Presidente Prudente/SP</em><br />
    <?php
    
      if ($_SESSION['adm']== false) {
    ?>

        Acesso a área<a href="../arquivos_site/adm/admin.php" class="reset_decor"> administrativa</a>
    <?php }
     ?>
  </div>
</footer>
</div>

<script src='./bootstrap-5.3.0-alpha3-dist/js/bootstrap.bundle.min.js'> </script>

</body>

</html>