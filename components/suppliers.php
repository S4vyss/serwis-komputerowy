<h2 style="font-size: 35px">
    Our Suppliers
</h2>
<section class="supplies" id="suppliers">
    <div class="arrows">
        <svg id="scroll-left-button" style="transform: rotate(180deg)" width="5%" height="5%" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 24L20 16L12 8" stroke="#07133B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
        <svg id="scroll-right-button" width="5%" height="5%" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 24L20 16L12 8" stroke="#07133B" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
    </div>
    <div class="scroll">
        <?php
            $connection = mysqli_connect('127.0.0.1', 'root', '', 'serwis') or die;
            $query = "SELECT * FROM supplier";
            $request = mysqli_query($connection, $query);


            $top = 240;

            if ($request->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($request)) {
                    $randomNumber = rand(1, 2);
                    $svgFile = "";
                    $phone = $row['phone'];
                    $chunkedString = chunk_split($phone, 3, ' ');

                    if ($randomNumber === 1) {
                        $svgFile = "https://www.serwisatium.pl/img/svg/serwisowanie-komputerow-uslugi-naprawy.svg";
                    } else {
                        $svgFile = "https://www.serwisatium.pl/img/svg/naprawa-komputerow-i-laptopow.svg";
                    }
                    echo "
                            <ul class='supplier'>
                                <li class='li-supplier'>
                                    <div class='inner'>
                                        <div class='icon-supply'><img width='100%' src={$svgFile} /></div>
                                        <p class='location'>
                                            {$row['location']}
                                            <br>
                                            <span class='phone'>
                                                +48 {$chunkedString}
                                            </span>
                                        </p>
                                    </div>
                                    <div class='outer'>
                                        <p class='desc-supplies'>
                                            {$row['supplies']}
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        ";
                    $top = $top + 30;
                }
                $request->free_result();
            }
            $connection->close();
        ?>
    </div>
    <div style='position: absolute; z-index: -2; left: 10%; top: 250%; filter: blur(100px); transform: rotate(-45deg)'>
        <div style='animation: none; filter: brightness(100%) blur(60px); top: 240%; width: 600px; height: 1000px' class='yellow2 blob2'>
            <div style='animation: none; filter: brightness(100%) blur(60px); top: 0%; width: 300px; height: 500px' class='red2 blob2'>

            </div>
        </div>
    </div>
</section>
<script>
    const scrollableContent = document.querySelector('.scroll');
    const scrollLeftButton = document.querySelector('#scroll-left-button');
    const scrollRightButton = document.querySelector('#scroll-right-button');
    let isMouseDown = false;
    let startX;
    let scrollLeft;

    scrollableContent.addEventListener('mousedown', (e) => {
        isMouseDown = true;
        startX = e.pageX - scrollableContent.offsetLeft;
        scrollLeft = scrollableContent.scrollLeft;
        scrollableContent.style.cursor = 'grabbing';
    });

    scrollableContent.addEventListener('mouseleave', () => {
        isMouseDown = false;
        scrollableContent.style.cursor = 'grab';
    });

    scrollableContent.addEventListener('mouseup', () => {
        isMouseDown = false;
        scrollableContent.style.cursor = 'grab';
    });

    scrollableContent.addEventListener('mousemove', (e) => {
        if (!isMouseDown) return;
        e.preventDefault();
        const x = e.pageX - scrollableContent.offsetLeft;
        const walk = (x - startX) * 2; // Adjust scrolling speed here
        scrollableContent.scrollLeft = scrollLeft - walk;
    });

    scrollLeftButton.addEventListener('click', () => {
        scrollableContent.scrollTo({
            left: scrollableContent.scrollLeft - 400, // Adjust scrolling distance here
            behavior: 'smooth'
        });
    });

    scrollRightButton.addEventListener('click', () => {
        scrollableContent.scrollTo({
            left: scrollableContent.scrollLeft + 400, // Adjust scrolling distance here
            behavior: 'smooth'
        });
    });
</script>
