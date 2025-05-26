<div class="bg-cgray w-full h-screen px-10 py-6 flex flex-col gap-y-6 overflow-y-scroll">
    <!-- Header / Profile -->
    <div class="items-center gap-x-4 justify-end hidden sm:flex">
        <img class="w-10" src="<?= base_url('assets/') ?>img/icons/default_profile.svg" alt="Profile Image">
        <p class="text-dark-green font-semibold"><?= $this->session->userdata('username') ?></p>
    </div>

    <!-- Breadcrumb -->
    <div>
        <ul class="flex items-center gap-x-4">
            <li>
                <a class="text-light-green" href="">Beranda</a>
            </li>
            <li>
                <span class="text-light-green">/</span>
            </li>
            <li>
                <a class="text-dark-green font-semibold" href="#">Nilai</a>
            </li>
        </ul>
    </div>
    <div class="container- bg-white p-4 rounded score-box">
        <div class="container p-2 lg:p-4 rounded">
            <div class="container" style="display: table;">
                <div class="flex flex-col md:flex-row md:items-center md:space-x-2 gap-y-2">
                    <p class="font-bold">Periode :</p>
                    <!-- CONTENT DROPDOWN -->

                    <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block flex-1  p-2.5">
                        <?php foreach ($batch as $item) : ?>
                            <option value="<?= $item->batch_id ?>"><?= $item->batch_name ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="container-lg">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg" id="printableArea">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                    <thead class="text-xs text-gray-700 uppercase bg-cream">
                        <tr>
                            <th scope="col-auto" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col-auto" class="px-6 py-3">
                                Batch
                            </th>
                            <th scope="col-auto" class="px-6 py-3">
                                Course
                            </th>
                            <th scope="col-auto" class="px-6 py-3">
                                Nilai
                            </th>
                            <th scope="col-auto" class="px-6 py-3">
                                Predikat
                            </th>

                    </thead>
                    <tbody>
                        <?php $x = 1;
                        foreach ($score as $item) : ?>
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4 font-medium text-gray-900 weight">
                                    <?= $x;
                                    $x++; ?>
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 weight">
                                    <table>

                                        <tr>
                                            <td>
                                                <p class="py-2"><?= $this->session->userdata('batch_id') ?></p>
                                            </td>
                                        </tr>


                                    </table>
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 score">
                                    <table>
                                        <tr>
                                            <td>
                                                <p class="py-2"><?= $item->assignment_name ?></p>
                                            </td>
                                        </tr>

                                    </table>
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 total">
                                    <table>
                                        <tr>
                                            <td>

                                            </td>
                                        </tr>

                                        <p class="py-2"> <?= $item->score_value ?></p>
                                    </table>
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 grade">
                                    <p class="py-2">
                                        <?php
                                        if ($item->score_value >= 85) {
                                            echo "A";
                                        } elseif ($item->score_value >= 80 && $item->score_value <= 84) {
                                            echo "A-";
                                        } elseif ($item->score_value >= 75 && $item->score_value <= 79) {
                                            echo "B+";
                                        } elseif ($item->score_value >= 70 && $item->score_value <= 74) {
                                            echo "B";
                                        } elseif ($item->score_value >= 65 && $item->score_value <= 69) {
                                            echo "C+";
                                        } elseif ($item->score_value >= 60 && $item->score_value <= 64) {
                                            echo "C";
                                        } elseif ($item->score_value >= 55 && $item->score_value <= 59) {
                                            echo "D";
                                        } elseif ($item->score_value >= 0 && $item->score_value <= 54) {
                                            echo "E";
                                        } else {
                                            echo "Not Found";
                                        }
                                        ?>
                                    </p>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <button onclick="printDiv()" class="mt-4 bg-blue-500 text-white font-semibold py-2 px-4 rounded">Cetak</button>
        </div>
    </div>
</div>
</div>

<script>
    function printDiv() {
        console.info("masuk sini");
        // Use querySelector instead of getElementById to handle CSS selectors like '#printableArea'
        var printContents = document.querySelector('#printableArea');

        if (!printContents) { // Added a check to ensure the element is found
            console.error("Error: Element with selector '" + divId + "' not found.");
            return; // Stop the function if the element isn't found
        }

        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents.innerHTML; // Access innerHTML here

        window.print();

        document.body.innerHTML = originalContents;
    }

    let btnToggle = document.getElementById('btnToggle');
    let btnToggle2 = document.getElementById('btnToggle2');
    let sidebar = document.querySelector('.sidebar');
    let leftNav = document.getElementById('left-nav');
    // let listMenu = document.getElementById('dropdownMenu');
    // let listContainer = document.getElementById('dropdownRightStart');


    btnToggle.onclick = function() {
        sidebar.classList.toggle('in-active');
    }

    btnToggle2.onclick = function() {
        leftNav.classList.toggle('hidden');
    }

    $(document).ready(function() {
        $('#btnHelp').click(function() {
            introJs().setOptions({
                steps: [{
                        intro: "Halo Selamat Datang Di Halaman Score Students"
                    }, {
                        element: document.querySelector('.score-box'),
                        intro: "Ini merupakan halaman score dimana students akan melihat nilai mereka"
                    }, {
                        element: document.querySelector('.batch'),
                        intro: "Di kolom pertama ini merupakan batch yang di ikutin oleh students"
                    },
                    {
                        element: document.querySelector('.course'),
                        intro: "Di kolom kedua ini merupakan course yang bakal di ikuti oleh students"
                    }, {
                        element: document.querySelector('.weight'),
                        intro: "Di kolom ketiga ini merupakan bobot nilai dari tiap - tiap course"
                    }, {
                        element: document.querySelector('.score'),
                        intro: "Di kolom keempat ini merupakan nilai/score dari tiap - tiap course"
                    },
                    {
                        element: document.querySelector('.total'),
                        intro: "Di kolom kelima ini merupakan total kalkulasi nilai/score dari tiap - tiap course"
                    },
                    {
                        element: document.querySelector('.grade'),
                        intro: "Di kolom keenam ini merupakan nilai/score huruf dari tiap - tiap course"
                    }

                ]
            }).start();
        })

    })
</script>