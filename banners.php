


<?php function banner_1(){ ?>
<div class="c-carousel car-1">
    <div class="slides js-slides">

        <?php 
            $imgList = []; 
            
            $path = "./banners/1/";
            $types = array( 'png', 'jpg', 'jpeg', 'gif' );
            $dir = new DirectoryIterator($path);
            foreach ($dir as $fileInfo) {
                $ext = strtolower( $fileInfo->getExtension() );
                if( in_array( $ext, $types ) ) array_push($imgList,$fileInfo->getFilename());
            }

            foreach ($imgList as $key => $value) {
        ?>        
            <div class="slide"><img src="./banners/1/<?php echo $value ?>" alt="Banner"></div>
        <?php
            }
        ?>

        <!-- <div class="slide"><img src="images/banner_2.jpg" alt="Banner"></div> -->
    </div>
    <div class="car-1-dots"></div>
    <!-- <button class="car-1-prev"><</button>
    <button class="car-1-next">></button> -->

    <div role="tablist">

    </div>
</div>
<?php
}
?>




<!-- Banner 2 -->


<?php function banner_2(){ ?>
<div class="c-carousel car-2">
    <div class="slides js-slides">

        <?php 
            $imgList = []; 
            
            $path = "./banners/2/";
            $types = array( 'png', 'jpg', 'jpeg', 'gif' );
            $dir = new DirectoryIterator($path);
            foreach ($dir as $fileInfo) {
                $ext = strtolower( $fileInfo->getExtension() );
                if( in_array( $ext, $types ) ) array_push($imgList,$fileInfo->getFilename());
            }

            foreach ($imgList as $key => $value) {
        ?>        
            <div class="slide"><img src="./banners/2/<?php echo $value ?>" alt="Banner"></div>
        <?php
            }
        ?>

        <!-- <div class="slide"><img src="images/banner_2.jpg" alt="Banner"></div> -->
    </div>
    <div class="car-2-dots"></div>
    <!-- <button class="car-1-prev"><</button>
    <button class="car-1-next">></button> -->

    <div role="tablist">

    </div>
</div>
<?php
}
?>
