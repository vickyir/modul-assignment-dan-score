<!-- Right side -->
<div class="bg-cgray w-full h-screen px-8 lg:px-10 py-6 flex flex-col gap-y-6 overflow-y-scroll">
    <!-- Header / Profile -->
    <div class="items-center gap-x-4 justify-end hidden sm:flex">
        <img class="w-10" src="<?=base_url('assets/')?>img/icons/default_profile.svg" alt="Profile Image">
        <p class="text-dark-green font-semibold"><?=$this->session->userdata('username')?></p>
    </div>



    <!-- Topic Title -->

    <div class="flex flex-col gap-y-2 topic-title">
        <p class="text-xl text-center sm:text-2xl xl:text-4xl text-dark-green font-semibold">Assignment Collection</p>
        <p class="text-base sm:text-lg lg:text-xl xl:text-2xl text-center text-dark-green">Tugas# </p>
    </div>

    <a href="" class="text-dark-green flex items-center font-medium text-sm space-x-2 mb-8">
        <img class="w-4 lg:w-5" src="<?= base_url('assets/') ?>img/icons/back_icons.svg" alt="Back Image">
        <p class="ml-2">Kembali</p>
    </a>

    <div id="table-finished">
        <p class="text-lg sm:text-xl lg:text-2xl xl:text-3xl text-dark-green font-semibold">Tugas Selesai</p>
    </div>

    <!-- Table Assignment -->
    <div class="container-lg">
        <div class="relative overflow-x-auto">
            <table class="shadow-lg bg-white rounded-xl" style="width: 100%">
                <colgroup>
                    <col span="1" style="width: 5%">
                    <col span="1" style="width: 20%">
                    <col span="1" style="width: 15%">
                    <col span="1" style="width: 20%">
                    <col span="1" style="width: 10%">
                    <col span="1" style="width: 10%">

                </colgroup>
                <thead>
                    <tr class="text-dark-green text-sm lg:text-base">
                        <th class="border-b text-left px-4 py-2">No</th>
                        <th class="border-b text-center px-4 py-2">Nama</th>
                        <th class="border-b text-center px-4 py-2">Tanggal Pengumpulan</th>
                        <th class="border-b text-center px-4 py-2">File</th>
                        <th class="border-b text-center px-4 py-2">Nilai</th>
                        <th class="border-b text-center px-4 py-2">Aksi</th>

                    </tr>
                </thead>
                <tbody>

                    <tr class="text-sm lg:text-base">
                        <td class="border-b px-4 py-2"></td>
                        <td class="border-b px-4 py-2 text-center"></td>
                        <td class="border-b px-4 py-2 text-center"></td>
                        <td class="border-b px-4 py-2 filename">
                        </td>
                        <td class="border-b px-4 py-2 text-center score"></td>

                        <td class="border-b px-4 py-2"><img class="w-5 lg:w-7 mx-auto cursor-pointer" src="<?= base_url('assets/') ?>img/icons/edit_icon.svg" data-modal-toggle="defaultModal" data-username="" data-tooltip-target="tooltip-default" data-scoreid="" data-student-id="" data-scorevalue="" alt="Edit Icon" type="button" data-target="#defaultModal" id="editbtn"></td>

                        <div id="tooltip-default" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-black rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip ">
                            Sudah mengubah score
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>

                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-8" id="table-unfinished">
        <p class="text-lg sm:text-xl lg:text-2xl xl:text-3xl text-dark-green font-semibold">Tugas Belum Selesai</p>
    </div>

    <!-- Table unfinished assignment -->
    <div class="container-lg">
        <div class="relative overflow-x-auto">
            <table class="shadow-lg bg-white rounded-xl" style="width: 100%">
                <colgroup>
                    <col span="1" style="width: 10%">
                    <col span="1" style="width: 25%">
                    <col span="1" style="width: 10%">
                    <col span="1" style="width: 20%">
                    <col span="1" style="width: 15%">
                </colgroup>
                <thead>
                    <tr class="text-dark-green text-sm lg:text-base">
                        <th class="border-b text-left px-4 py-2">No</th>
                        <th class="border-b text-center px-4 py-2">Nama</th>
                        <th class="border-b text-center px-4 py-2">Tanggal Pengumpulan</th>
                        <th class="border-b text-center px-4 py-2">File</th>
                        <th class="border-b text-center px-4 py-2">Nilai</th>
                        <th class="border-b text-center px-4 py-2">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    
                        <tr class="text-sm lg:text-base">
                            <td class="border-b px-4 py-2 text-red-600"></td>
                            <td class="border-b px-4 py-2 text-center text-red-600"></td>
                            <td class="border-b px-4 py-2 text-center text-red-600"></td>
                            <td class="border-b px-4 py-2 text-center text-red-600"></td>

                           
                            <td class="border-b px-4 py-2 text-center text-red-600"></td>

                            <td class="border-b px-4 py-2">
                                <img class="w-5 lg:w-7 mx-auto cursor-pointer" src="<?=base_url('assets/')?>img/icons/edit_icon.svg" alt="Edit Icon" type="button" data-scoreid="" data-username="" data-scorevalue="" data-target="#defaultModal1" id="editbtn1">
                            </td>
                        </tr>
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<!-- modal FINISHED ASSIGNMENT -->
<div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex justify-center items-start p-5 rounded-t ">
                <h3 class="text-xl font-bold  lg:text-2xl text-dark-green">
                    Edit Nilai
                </h3>
            </div>
            <!-- Modal body -->
            <div class="px-6 space-y-6">
                <form class="flex flex-col gap-y-4" id="scoreform" action="" method="POST">
                    <div class="mb-6">
                        <input type="hidden" id="sid" name="sid">
                        <input type="hidden" id="studentId" name="studentId">
                        <input type="number" id="score" name="score" min="0" max="100" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <li class="font-semibold text-dark-green text-xs mt-2">Masukan nilai dari 0-100</li>
                    </div>
                    <div class="flex justify-end p-6 space-x-3 rounded-b ">
                        <button data-modal-toggle="defaultModal" class="w-24" type="button">Batal</button>
                        <button class="bg-cream text-white  font-semibold justify-end text-center py-2 rounded-lg w-24 ml-auto" type="submit" name="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->

<!-- modal UNFINISHED ASSIGNMENT -->
<div id="defaultModal1" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex justify-center items-start p-5 rounded-t ">
                <h3 class="text-xl font-bold  lg:text-2xl text-dark-green">
                    Edit Nilai
                </h3>
            </div>
            <!-- Modal body -->
            <div class="px-6 space-y-6">
                <form class="flex flex-col gap-y-4" id="scoreform1" action="" method="POST">
                    <div class="mb-6">
                        <input type="hidden" id="sid1" name="sid1">
                        <input type="hidden" id="studentId1" name="studentId1">
                        <input type="hidden" id="studentId1" name="studentId1">
                        <input type="hidden" id="mentorid" name="mentorid" value="">
                        <input type="number" id="score1" min="0" max="100" name="score1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <li class="font-semibold text-dark-green text-xs mt-2">Masukan nilai dari 0-100</li>
                    </div>
                    <div class="flex justify-end p-6 space-x-3 rounded-b ">
                        <button id="btnBatal" class="w-24" type="button">Batal</button>
                        <button class="bg-cream text-white  font-semibold justify-end text-center py-2 rounded-lg w-24 ml-auto" type="submit" name="submit1">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL -->



<script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>

<script>
    let btnToggle = document.getElementById('btnToggle');
    let btnToggle2 = document.getElementById('btnToggle2');
    let sidebar = document.querySelector('.sidebar');
    let leftNav = document.getElementById("left-nav");
    let targetModal = document.getElementById('defaultModal1');
    let btnBatal = document.getElementById('btnBatal')
    const options = {
        placement: 'center',
        backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
        onHide: () => {
            console.log('modal is hidden');
        },
        onShow: () => {
            console.log('modal is shown');
        },
        onToggle: () => {
            console.log('modal has been toggled');
        }
    };
    let modal = new Modal(targetModal, options);

    btnToggle.onclick = function() {
        sidebar.classList.toggle('in-active');
    }

    btnToggle2.onclick = function() {
        leftNav.classList.toggle('hidden');
    }



    // Bug on click mobile navbar
    // leftNav.onclick = function() {
    //     leftNav.classList.toggle('hidden');
    // }

    $(document).ready(function() {
        $('#btnHelp').click(function() {
            introJs().setOptions({
                steps: [{
                        intro: "Hello Selamat Datang Di Halaman Assignment Collection"
                    }, {
                        element: document.querySelector('.topic-title'),
                        intro: "Ini merupakan halaman assignment collection dimana mentor akan memberikan score terhadap assignment yang di kumpulkan oleh students"
                    }, {
                        element: document.querySelector('#table-finished'),
                        intro: "Ini merupakan tabel students yang telah mengumpulkan assignments"
                    },
                    {
                        element: document.querySelector('#table-unfinished'),
                        intro: "Ini merupakan tabel students yang telah belum/tidak mengumpulkan assignments"
                    },
                    {
                        element: document.querySelector('.filename'),
                        intro: "Untuk mendownload file assignment students click pada filename assignments collection"
                    }, {
                        element: document.querySelector('#editbtn'),
                        intro: "Ini adalah tombol action untuk memberikan score pada Assignments Students"
                    }, {
                        title: 'Modal Add Score Assignment',
                        intro: '<img src="../../Img/assets/modal_score.png" onerror="this.onerror=null;this.src=\'https://i.giphy.com/ujUdrdpX7Ok5W.gif\';" alt="" data-position="top">'
                    }, {
                        element: document.querySelector('.score'),
                        intro: "Setelah mentor memberi score, score nanti akan tampil seperti ini"
                    }

                ]
            }).start();
        })

        $('#editbtn1').click(function() {
            if (confirm("Apakah yakin akan mengedit score")) {
                modal.show()
            }
        })

        $('#btnBatal').click(function() {
            modal.hide()
        })


        $(document).on('click', '#editbtn', function() {
            let username = $(this).data('username');
            let scoreID = $(this).data('scoreid');
            // let studentId = $(this).data('student-id');
            let scoreValue = $(this).data('scorevalue');
            $('#sid').val(scoreID);
            $('#studentId').val(studentId);
            // console.log(userID);

            $('#score').attr('placeholder', 'Input score for ' + username);
        })
        $(document).on('click', '#editbtn1', function() {
            let username = $(this).data('username');
            let scoreID = $(this).data('scoreid');
            // let studentId = $(this).data('student-id');
            let scoreValue = $(this).data('scorevalue');
            $('#sid1').val(scoreID);
            $('#studentId1').val(studentId);
            // console.log(userID);

            $('#score1').attr('placeholder', 'Input score for ' + username);
        })
        $('#scoreform').validate({
            errorClass: "error fail-alert",
            validClass: "valid success-alert",
            rules: {
                score: {
                    number: true,
                    min: 0,
                    max: 100,
                }
            },
            messages: {
                score: {
                    number: 'Score must be number',
                    min: 'Min score is 0 ',
                    max: 'max score is 100'
                }
            }
        })
        $('#scoreform1').validate({
            errorClass: "error fail-alert",
            validClass: "valid success-alert",
            rules: {
                score: {
                    number: true,
                    min: 0,
                    max: 100,
                }
            },
            messages: {
                score: {
                    number: 'Score must be number',
                    min: 'Min score is 0 ',
                    max: 'max score is 100'
                }
            }
        })

    })
</script>