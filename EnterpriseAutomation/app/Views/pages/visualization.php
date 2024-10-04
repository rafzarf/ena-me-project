<?php 

$data = array($title , $nav_active);

$this->extend("layout/template.php", $data);

$this->section('content');



// dd();
?>
<div class="card mt-4">
    <div class="card-header pb-1 pe-0">

    </div>
    <div class="card-body pt-0 mt-0 overflow-auto">
        <div class="fixdiv mx-auto">
            <div class="row mt-4 w-100 mx-0">
                <?php
            $i = 0;
            foreach($mesinData as $Mesin){
                if ($i++ % 2 == 0) {
                    echo '<div class="col-auto mx-auto">
                    <div class="rounded-3 h-100 pb-0">
                        <div class="">
                            <div class="mesin-pict p-0 bg-polman cardBackground"
                                style="background-image: url(/assets/img/'.$Mesin->gambar_mesin.');">
                            </div>
                        </div>
                        <div class="w-75 mx-auto text-wrap">
                                <p class="mt-3 text-wrap">
                                    <span class="text-xs w-100 text-wrap mb-4 badge badge-sm bg-gradient-polman">'
                                    .$Mesin->nama_mesin.'
                                    </span>
                                </p>
                        </div>';

                        $is_component = false;
                        $is_diproses = false;
                        $component_array = array();

                        foreach($dataKerja as $kerja){
                            if($kerja['nama_mesin'] == $Mesin->nama_mesin) {
                                $is_component = true;

                                array_push($component_array, ["Nama_Komponen" => $kerja['nama_komponen']
                                                            , "Status" => $kerja['status'],
                                                            "No_SPK" => $kerja['no_spk'],
                                                            "Kode_Mesin" => $kerja['no_mesin']]);
                                json_encode($component_array);
                            } 
                        }
                        if ($is_component == true) {
                            echo '
                            <div class="w-75 mx-auto Minetooltip text-wrap">';

                            foreach ($component_array as $data) {
                                if($data['Status'] === "Diproses") {
                                    $is_diproses = true;
                                }
                            }

                            if($is_diproses) {
                                echo '<i class="rounded-circle text-white mx-pkg text-center bx bxs-circle
                                bg-gradient-info px-1 py-1">';
                            }

                            echo '
                            </i><span class="shadow text-center p-2 tooltiptext">
                            ';
                            foreach ($component_array as $data) {
                                if($data['Status'] === "Diproses") {
                                    echo '
                                    <p class="text-sm mb-0"><span class="text-xs text-wrap badge m-2 badge-sm bg-gradient-polman">'.$data['No_SPK'].'
                                    </span><span class="text-xs text-wrap badge m-2 badge-sm bg-gradient-warning">'.$data['Nama_Komponen']. " : ".$data['Status'].'
                                    </span><span class="text-xs text-wrap badge m-2 badge-sm bg-gradient-success">'.$data['Kode_Mesin'].'
                                    </span></p>';
                                }
                            }
                            echo '</span></div>';
                        } else {
                            echo '
                            <div class="w-75 mx-auto text-wrap">
                            <i class="rounded-circle mx-pkg text-center bx 
                            bxs-circle opacity-0 bg-gradient-info px-1 py-1"></i> 
                            </div>';
                        }

                        echo'
                        <div class="bg-secondary mx-auto line-mesin-vert"></div>
                    </div>
                </div>';
                } 
            } ?>
            </div>

            <div class="row mx-auto line-mesin bg-secondary">
            </div>

            <div class="row mb-5 w-100 mx-0">
                <?php
            $i = 0;
            foreach($mesinData as $Mesin){
                if ($i++ % 2 != 0) {
                    echo '
                    <div class="col-auto mx-auto">
                        <div class="rounded-3 pb-0">
                        <div class="bg-secondary mb-4 mx-auto line-mesin-vert2"></div>';
                        $is_component = false;
                        $is_diproses = false;
                        $component_array = array();


                        foreach($dataKerja as $kerja){
                            if($kerja['nama_mesin'] == $Mesin->nama_mesin) {
                                $is_component = true;

                                array_push($component_array, ["Nama_Komponen" => $kerja['nama_komponen']
                                                            , "Status" => $kerja['status'],
                                                            "No_SPK" => $kerja['no_spk'],
                                                            "Kode_Mesin" => $kerja['no_mesin']]);
                                json_encode($component_array);
                            } 
                        }
                        if ($is_component == true) {
                            echo '
                            <div class="w-75 mx-auto Minetooltip text-wrap">';

                            foreach ($component_array as $data) {
                                if($data['Status'] === "Diproses") {
                                    $is_diproses = true;
                                }
                            }

                            if($is_diproses) {
                                echo '<i class="rounded-circle text-white mx-pkg text-center bx bxs-circle
                                bg-gradient-info px-1 py-1">';
                            }
                            
                            echo '
                            </i><span class="shadow text-center p-2 tooltiptext">';
                            foreach ($component_array as $data) {
                                if($data['Status'] === "Diproses") {
                                    echo '
                                    <p class="text-sm mb-0"><span class="text-xs text-wrap badge me-2 badge-sm bg-gradient-polman">'.$data['No_SPK'].'
                                    </span><span class="text-xs text-wrap badge m-2 badge-sm bg-gradient-warning">'.$data['Nama_Komponen']. " : ".$data['Status'].'
                                    </span><span class="text-xs text-wrap badge badge-sm bg-gradient-success">'.$data['Kode_Mesin'].'
                                    </span></p>';
                                }
                            }
                            echo '</span></div>';
                        } else {
                            echo '
                            <div class="w-75 mx-auto text-wrap">
                            <i class="rounded-circle mx-pkg text-center bx 
                            bxs-circle opacity-0 bg-gradient-info px-1 py-1"></i> 
                            </div>';
                        }

                        echo '
                            <div class="pt-4">
                                <div class="mesin-pict p-0 bg-polman cardBackground"
                                    style="background-image: url(/assets/img/'.$Mesin->gambar_mesin.');">
                                </div>
                            </div>
                            <div class="w-75 mx-auto text-wrap">
                                <p class="mt-3 text-wrap">
                                    <span class="text-xs w-100 text-wrap mb-2 badge badge-sm bg-gradient-polman">'
                                    .$Mesin->nama_mesin.'
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>';
                } 
            } ?>
            </div>
        </div>
    </div>
</div>

<?php 

include "footerjs.php"

?>

<script>
    $('.Minetooltip').mouseover(function () {
        $(this).each(function () {
            var toolTipWidth = $(".tooltiptext").width();
            var toolTipHeight = $(".tooltiptext").height();
            
            var fixdiv = $(".fixdiv").offset().left;
            var top = 30;
            var left = $(this).offset().left;
            
            if(left < 500) {
                left = $(this).offset().left - fixdiv - 80;
            } else if(left > 800) {
                left = $(this).offset().left - (fixdiv +  $(this).offset().left - 120);
            } else {
                left = -150;
            }
            $(this).find('.tooltiptext').css({
                'top': top,
                'left': left
            });

            //show tool tips 
            $(this).find('.tooltiptext').show();
        })
    });

    $('.Minetooltip').mouseout(function () {
        $('.tooltiptext').hide();
    });
</script>
<?=$this->endSection();?>