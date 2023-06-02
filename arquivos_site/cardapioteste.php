<?php require_once("header.php"); ?>

<body style="min-width: 372px;">

    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>  
    
    <main>
        <div class="container"> 
            <div class="row">
                <div class="col-12 col-md-5">

                     <form class="justify-content-center justify-content-md-start"> <!--faz alinhamento  -->

                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Digete aqui o que procura">
                            <button class="btn btn-danger">
                                Buscar
                            </button>
                        </div>

                    </form>

                </div>
                <div class="col-12 col-md-7">   
                    <div class="d-flex flex-row-reverse justify-content-center justify-content-md-start">
                        <form class="ml-3 d-inline-block">

                            <select class="form-select form-select-sm">
                                <option> Ordenar pelo nome</option>
                                <option> Ordenar menor preço</option>
                                <option> Ordenar maior preço</option>
                            </select>

                        </form>
                        <nav class="d-inline-block">
                            <ul class="pagination pagination-sm my-0">
                                <li class="page-item">
                                    <button class="page-link">1</button>
                                </li>
                                <li class="page-item">
                                    <button class="page-link">2</button>
                                </li>
                                <li class="page-item disabled">
                                    <button class="page-link">3</button>
                                </li>
                                <li class="page-item">
                                    <button class="page-link">4</button>
                                </li>
                                <li class="page-item">
                                    <button class="page-link">5</button>
                                </li>
                                
                            </ul>

                        </nav>

                    </div>
                    
                </div>
            </div>
            <!-- linha separadora -->
            <hr class="mt-3">
        </div>
    </main>

</body>