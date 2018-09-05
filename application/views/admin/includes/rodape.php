</body>

<!--   Core JS Files   -->
<script src="<?= base_url(); ?>dist/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>dist/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="<?= base_url(); ?>dist/js/bootstrap-checkbox-radio.js"></script>

<!--  Charts Plugin -->
<script src="<?= base_url(); ?>dist/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="<?= base_url(); ?>dist/js/bootstrap-notify.js"></script>


<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="<?= base_url(); ?>dist/js/paper-dashboard.js"></script>


<!-- jQuery -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="//www.fuelcdn.com/fuelux/3.13.0/js/fuelux.min.js"></script>

<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="<?= base_url(); ?>dist/js/demo.js"></script>

<script src="<?= base_url(); ?>dist/ckeditor/ckeditor.js"></script>

<script>
    CKEDITOR.replace('estoria');
    // CKEDITOR.replace('chave');
</script>
<script>
    window.onload = function () {
        CKEDITOR.replace('estrategia');
    };
</script>
<script>
    $(document).ready(function () {
        $('#area').change(function () {
            var id_area = $(this).val();
            $.ajax(`<?= base_url() ?>admin/casos/busca_subarea/${id_area}`)
                    .done(function (response) {
                        $('#subarea').removeAttr('disabled');
                        $('#subarea').html(response);
                    });
        });


    });
</script>
<script>
    $(document).ready(function () {
        if (<?= $ultimo ?>) {
            $(`#inserir_estrategia`).modal('show');
        }
    });
</script>
<script>
    function openModal(id_caso) {
        $(`#${id_caso}`).modal('show');
        $.ajax(`<?= base_url() ?>admin/casos/busca_estrategias/${id_caso}`)
                .done(function (response) {
                    $(`#estrategias${id_caso}`).html(response);
                });
    }
</script>

<script>
//    $('#btnItems').click(function () {
//        $(`#cria_estrategia`).modal('show');
//
//    });
//    function save(text) {
    $('#btnItems').click(function () {
        var texto = $('#myPillbox').pillbox('items');

        var aux = [];
        texto.forEach(function (item) {
            aux.push(item.text);
        });

        var str = aux.join();

        document.getElementById('chave').value = str;
        var nome = $("#nome").val();
        var area = $("#area").val();
        var estoria = CKEDITOR.instances.estoria.getData();

//alert(nome);
//alert(estoria);
        if (nome == '' || estoria == '' || texto == '' || area == '#') {
            $("#mensagem").html("<div class='row col-lg-12'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Preencha os campos obrigatórios da forma adequada!</div></div>");
        } else {
            $("#novo_caso").submit();
        }

    });
//    }

</script>
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<script>
    $(document).ready(function () {
        $('.char-count').keyup(function () {
            var maxLength = parseInt($(this).attr('maxlength'));
            var length = $(this).val().length;
            var newLength = maxLength - length;
            var name = $(this).attr('name');
            $('span[name="' + name + '"]').text(newLength);
        });
    });
</script>

<script>
<?php for ($i = 0; $i < $tam; $i++) { ?>
        $('#myPillbox').pillbox('addItems', [{text: '<?= $chave[$i] ?>', value: '<?= $chave[$i] ?>'}]);
    <?php
}
?>
</script>
<script>
    $('#btnEditar').click(function () {
        var texto = $('#myPillbox').pillbox('items');

        var aux = [];
        texto.forEach(function (item) {
            aux.push(item.text);
        })

        var str = aux.join();

        document.getElementById('chave').value = str;
        var nome = $("#nome").val();
        var area = $("#area").val();
        var estoria = CKEDITOR.instances.estoria.getData();

//alert(nome);
//alert(estoria);
        if (nome == '' || estoria == '' || texto == '' || area == '#') {
            $("#mensagem").html("<div class='row col-lg-12'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Preencha os campos obrigatórios da forma adequada!</div></div>");
        } else {
            $("#edita_caso").submit();
        }

    });
</script>
</html>
