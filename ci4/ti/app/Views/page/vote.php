<?= $this->extend('Template/template'); ?>

<?= $this->Section('content'); ?>
<div class="vote">
    <h4 class="text-center">Voting pemilhan ketua pelaksana bukber 2024</h4>
    <div class="list_poling">
        <form action="/pol" method="post">
            <ul>
                <?php foreach ($data_option as $pilh) : ?>
                    <li>
                        <input class="form-check-input" type="radio" name="poling" id="exampleRadios1" value="<?= $pilh['id_option'] ?>" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            <?= $pilh['value_voting'] ?>
                        </label>
                    </li>
                <?php endforeach; ?>
            </ul>
            <button type="submit" class="btn btn-outline-info">Vote</button>
        </form>
    </div>
</div>
</div>

<?= $this->endSection();
