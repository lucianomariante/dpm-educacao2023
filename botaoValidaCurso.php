<?php if ($curso['INSCRICOESEADATIVA'] == 'false') : ?>
    <?php if ($curso['CURVAGAS'] - $curso['CURMATRICULADOS'] <= 0) : ?>
        <?php if ($curso['CURNOVATURMA'] === 'S') : ?>
            <a class="roboto-bold btn btn-danger text-uppercase btn-block rounded-0 transition-color mt-1 text-sub-title-16" role="button">lotado</a>
            <a class="raleway-bold btn btn-accept btn-sm rounded-0 transition-color mt-1 text-uppercase text-sub-title-16" href="cursos/<?= $curso['CURVINCULOTREINAMENTO']; ?>" role="button">Nova Turma </br>
                <p class="text-sub-title-10">(Inscrições abertas)</p>
            </a>
        <?php else : ?>
            <a class="roboto-bold btn btn-danger text-uppercase btn-block rounded-0 transition-color mt-1 text-sub-title-16" role="button">lotado</a>
            <a class="raleway-bold btn btn-blue btn-sm rounded-0 transition-color mt-1 text-uppercase text-sub-title-16" href="cursos/lista-espera/<?= $curso['CURCODIGO']; ?>" role="button">Lista de espera</a>
        <?php endif; ?>
    <?php else : ?>
        <a class="raleway-bold btn btn-block rounded-0 button-link bg-orange-theme text-white-theme text-uppercase text-sub-title-16 transition-color mb-1" href="identificacao-acesso/<?= $curso['CURCODIGO']; ?>" role="button">Inscreva-se</a>
    <?php endif; ?>
<?php endif; ?>
<?php if ($curso['INSCRICOESEADATIVA'] == 'true') : ?>
    <?php if ($curso['CURAOVIVO'] == 'false') : ?>
        <a class="raleway-bold btn btn-block rounded-0 button-link bg-orange-theme text-white-theme text-uppercase text-sub-title-16 transition-color mb-1" href="identificacao-acesso/<?= $curso['CURCODIGO']; ?>" role="button">Inscreva-se</a>
    <?php endif; ?>
    <?php if ($curso['CURAOVIVO'] == 'true') : ?>
        <?php if ($curso['CURVAGAS'] - $curso['CURMATRICULADOS'] <= 0) : ?>
            <?php if ($curso['CURNOVATURMA'] === 'S') : ?>
                <a class="roboto-bold btn btn-danger text-uppercase btn-block rounded-0 transition-color mt-1 text-sub-title-16" role="button">lotado</a>
                <a style="color: white" class="raleway-bold btn btn-accept btn-sm rounded-0 transition-color mt-1 text-uppercase text-sub-title-16" href="cursos/<?= $curso['CURVINCULOTREINAMENTO']; ?>" role="button">Nova Turma </br>
                    <p class="text-sub-title-10" style="font-size: 10px; color: white">(Inscrições abertas)</p>
                </a>
            <?php else : ?>
                <a class="roboto-bold btn btn-danger text-uppercase btn-block rounded-0 transition-color mt-1 text-sub-title-16" role="button">lotado</a>
                <a class="raleway-bold btn btn-blue btn-sm rounded-0 transition-color mt-1 text-uppercase text-sub-title-16" href="cursos/lista-espera/<?= $curso['CURCODIGO']; ?>" role="button">Lista de espera</a>
            <?php endif; ?>
        <?php else : ?>
            <a class="raleway-bold btn btn-block rounded-0 button-link bg-orange-theme text-white-theme text-uppercase text-sub-title-16 transition-color mb-1" href="identificacao-acesso/<?= $curso['CURCODIGO']; ?>" role="button">Inscreva-se</a>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>