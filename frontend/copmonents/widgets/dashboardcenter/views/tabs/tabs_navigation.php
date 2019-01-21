

<div class="tab-nav">
    <ul class="tabs-navigation" id="sporttabsNavigation">



    </ul>
</div>

<?php if(0){ ?>
    <div class="tab-nav">
        <ul class="tabs-navigation" id="sporttabsNavigation">

            <li>
                <a href="#tab_7" id="sp_7"  class="<?= 7?'active':''; ?> tab-trigger" data-toggle="tabs"><span class="icon-football"></span> Футбол(временно)</a>
            </li>

        </ul>
    </div>
<?php  } ?>

<?php if(0){ ?>
    <div class="tab-nav">
        <ul class="tabs-navigation" id="sporttabsNavigation">
            <?php  foreach ($tabs as $k=>$tab) { ?>
                <li>
                    <a href="#tab_<?=$k?>" id="sp_<?=$k?>"  class="<?= $activeIdtab==$k?'active':''; ?> tab-trigger" data-toggle="tabs"><span class="icon-football"></span> <?=$tab?></a>
                </li>
            <?php   } ?>
        </ul>
    </div>
<?php } ?>

