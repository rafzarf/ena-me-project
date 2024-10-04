<?php 

$data = array($title , $nav_active);

$this->extend("layout/template.php", $data);

$this->section('content');

$array = array_map('json_encode', $dataspk);
$array = array_unique($array);
$array = array_map('json_decode', $array);

$loadMachine = 0;
foreach($dataLoad as $load){
    $loadMachine += intval($load->wkt_pengerjaan);
}

?>

<div class="card mt-4">
    <div class="card-header pb-1 pe-0">
        <div class="row w-100">
            <div class="col mb-lg-0 mb-3">
                <div class="w-100 my-auto text-start">
                    <h6 class="text-white badge bg-gradient-polman my-auto poppins-bold">
                        Load Machine : <?= $loadMachine ?> Jam</h6>
                    <h5 class=" ms-1 mt-2 mb-0 text-dark"><?=$datamesin?></h5>
                </div>
            </div>
            <div class="col my-1 col-lg-auto pe-0 d-flex justify-content-lg-end justify-content-center">
                <div class="row w-100">
                    <div class="col px-0">
                        <div
                            class="ms-md-auto pe-md-3 d-flex align-items-center justify-content-end ms-sm-auto me-lg-0 me-sm-3">
                            <form action="" id="searchbar" method="GET">
                                <div class="position-relative">
                                    <div class="input-set">
                                        <input type="text" id="searchbox" class="form-control"
                                            placeholder="Type here..." name="keyword"
                                            value="<?php if(isset($_GET['keyword'])) echo $_GET['keyword'];?>">
                                        <?php 
                                        if(empty($_GET['keyword'])) {
                                            echo ' <button anim="ripple" type="button" class="arrowicon searchbtn btn m-0"><i
                                            class="text-white fs-6 bx bx-search"></i> </button>';
                                        } else {
                                            echo '<button anim="ripple" type="button" class="bg-danger arrowicon searchdel btn m-0"><i
                                            class="text-white fs-6 bx bxs-trash-alt"></i> </button>';
                                        }?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="option-dropdown col-auto ps-0 pe-lg-0 me-lg-4">
                        <div class="btn-group dropstart">
                            <button class="pt-2 ps-lg-0 ps-2 pe-0 btn btn-mesin" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false" data-bs-auto-close="outside">
                                <i class="text-dark fs-3 bx bx-dots-vertical-rounded"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li class="">
                                    <div class="w-100 btn-group dropstart">
                                        <a type="button" class="ps-0 d-flex text-dark dropdown-item"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="row mx-0 w-100">
                                                <div class="col">
                                                    <span class="text-start">
                                                        <i class='my-auto text-xxs bx bxs-left-arrow'></i></span>
                                                </div>
                                                <div class="col px-0">
                                                    <span class="text-end">Data Per Halaman</span>
                                                </div>
                                            </div>
                                        </a>
                                        <ul class="dropdown-menu sub-menu">
                                            <li><a class="text-dark text-center dropdown-item" href="?&entries=9">9
                                                </a></li>
                                            <li><a class="text-dark text-center dropdown-item" href="?&entries=12">12
                                                </a>
                                            </li>
                                            <li><a class="text-dark text-center dropdown-item" href="?&entries=15">15
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body pt-0 mt-0">
<?php
$i = 0;
$last_product = "";
$curr_product = "";
echo "<div class='table-responsive'>\n";
echo "<table class='table table-mesin table-borderless align-items-center mb-0'>\n";
echo "<tr>\n";

foreach($array as $spk){
    $curr_spk = $spk->no_spk;
    foreach($dataAll as $dat) {
        if($dat['no_spk'] == $curr_spk && $dat['nama_produk'] != $last_product ) {
            $curr_product = $dat['nama_produk'];}
            $last_product = $dat['nama_produk'];
    }
    if ($i++ % 3 == 0) {
        echo "</tr><tr>\n";
    }
        echo'<td class="">
        <div class="rounded-3 pb-0 h-100">
            <div class="card h-100 w-100">
            <a href="'.base_url()."permesinan/".$datamesin."/".$curr_spk.'">
                <div class="card-body p-0 rounded-3 operator-menu bg-light cardBackground">
                    <p class="text-center pt-4 mb-0 text-md text-dark fw-bold">'.$curr_spk.'</p>
                    <p class="text-center pt-3 pb-4 mb-0 text-md text-dark"> Nama Produk : ';
                    echo $curr_product;
                    echo'</p>
                </div>
            </a>
            </div>
        </div>
    </td>';
}
while ($i++ % 3 != 0) {
    echo "<td></td>\n";
}
echo "</tr>\n";
echo "</table>\n";
echo "</div>\n";
?>
        <div class="mt-4">
            <?= $pager->links() ?>
        </div>
    </div>
</div>

<?php 

include "footerjs.php"

?>

<?=$this->endSection();?>