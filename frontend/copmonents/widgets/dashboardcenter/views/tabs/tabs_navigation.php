<div class="tab-nav">
    <ul class="tabs-navigation">
        <?php  foreach ($tabs as $k=>$tab) { ?>
            <li>
                <a href="#tab_<?=$k?>"  class="<?= $activeIdtab==$k?'active':''; ?> tab-trigger" data-toggle="tabs"><span class="icon-football"></span> <?=$tab?></a>
            </li>
       <?php   } ?>
    </ul>
</div>
