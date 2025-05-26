 <!-- Right side -->
 <div class="bg-cgray w-full h-screen px-10 py-6 flex flex-col gap-y-6 overflow-y-scroll rightbar">
     <!-- Header / Profile -->
     <div class="items-center gap-x-4 justify-end hidden sm:flex" id="profil_image2">
         <img class="w-10" src="<?= base_url('assets/') ?>img/icons/default_profile.svg" alt="Profile Image">
         <p class="text-dark-green font-semibold"><?= $this->session->userdata('username') ?></p>
     </div>

     <!-- Breadcrumb -->
     <div class="p-2 lg:p-4">
         <ul class="flex items-center gap-x-4 text-xs lg:text-base">
             <li class="flex items-center space-x-2">
                 <a class="text-light-green hover:text-dark-green hover:font-semibold" href="#">Beranda</a>
             </li>
             <li>
                 <span class="text-light-green">/</span>
             </li>
             <li class="flex items-center space-x-2">
                 <a class="text-light-green hover:text-dark-green hover:font-semibold" href="">Batch</a>
             </li>
             <li>
                 <span class="text-light-green">/</span>
             </li>
             <li class="flex items-center space-x-2">
                 <a class="text-light-green" href="">Materi</a>
             </li>
             <li>
                 <span class="text-light-green">/</span>
             </li>
             <li>
                 <a class="text-dark-green font-semibold" href="#">Penugasan</a>
             </li>
         </ul>
     </div>

     <!-- Topic Title -->
     <div class="p-2 lg:p-4 topic-title">
         <p class="text-sm sm:text-lg lg:text-2xl xl:text-4xl text-dark-green font-semibold">Pertemuan#1 <?= $modul->modul_name ?></p>
     </div>

     <!-- Mentor -->
     <div class="p-2 lg:p-4 flex items-center gap-x-4 w-full bg-white py-4 px-5 lg:px-10 rounded-xl mentor-profile">
         <img class="w-8 lg:w-14" src="<?= base_url('assets/') ?>Img/icons/default_profile.svg" alt="Profile Image">
         <div class="">
             <p class="text-dark-green text-sm lg:text-base font-semibold"><?= $mentor->user_first_name . " " . $mentor->user_last_name ?></p>
             <!-- <p class="text-light-green">Mentor Specialization</p> -->
         </div>
     </div>

     <!-- Tab -->
     <div class="bg-white w-full h-[50px] flex content-center px-10 tab-menu">
         <ul class="flex items-center gap-x-8 text-sm lg:text-base">
             <li class="text-dark-green hover:text-cream hover:border-b-4 hover:border-cream h-[50px] flex items-center font-semibold  cursor-pointer active">
                 <p>Penugasan</p>
             </li>
         </ul>
     </div>

     <!-- TOMBOL TAMBAH ASSIGNMENT BARU -->
     <a class="text-xs lg:text-base bg-cream text-white font-semibold justify-start text-center py-2 rounded-lg w-[120px] md:w-[170px] cursor-pointer" type="button" data-modal-toggle="addModal" id="btnAddAssignment">Tambah Tugas</a>

     <!-- Main Add modal -->
     <div id="addModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-screen md:h-full">
         <div class="relative p-4 w-full max-w-2xl h-full">
             <!-- Modal Add content -->
             <div class="relative bg-white rounded-lg shadow ">
                 <!-- Modal Add header -->
                 <div class="flex justify-center items-start p-5 rounded-t">
                     <h3 class="text-xl font-semibold text-gray-900 lg:text-2xl dark:text-dark">
                         Tambah Tugas
                     </h3>
                 </div>
                 <!-- Modal Add body -->
                 <div class="p-6 space-y-6">
                     <!-- CONTENT FORM TAMBAH ASSIGNMENT BARU -->
                     <form method="POST" action="<?= site_url('mentor/create_assignment/' . $this->uri->segment(3)) ?>" id="modalupload" enctype="multipart/form-data">
                         <div class="mb-6">
                             <label for="upload_title" class="block mb-2 text-sm font-bold text-dark-900 dark:text-dark-300">Judul</label>
                             <input type="text" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500" required name="title">
                         </div>
                         <!-- LABEL START DATE -->
                         <div class="mb-6">
                             <label for="upload_startDate" class="block mb-2 text-sm font-bold text-dark-900 dark:text-dark-300">Waktu Dimulai</label>
                             <input type="datetime-local" id="upload_startDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500" required name="start-date">
                         </div>
                         <!-- LABEL DUE DATE -->
                         <div class="mb-6">
                             <label for="upload_dueDate" class="block mb-2 text-sm font-bold text-dark-900 dark:text-dark-300">Batas Waktu</label>
                             <input type="datetime-local" id="upload_dueDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500" required name="end-date">
                         </div>
                         <!-- LABEL DESKRIPSI -->
                         <div class="mb-6">
                             <label for="upload_deksripsi" class="block mb-2 text-sm font-bold text-dark-900 dark:text-dark-300">Deskripsi</label>
                             <textarea id="deskripsi" rows="4" class="block p-2.5 w-full text-sm text-dark-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-white-700 dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500" name="desc"></textarea>
                         </div>
                         <!-- LABEL DROPDOWN TIPE ASSIGNMENT -->
                         <div class="mb-6">
                             <label for="upload_assign_type" class="block mb-2 text-sm font-bold text-dark-900 dark:text-dark-300">Tipe Tugas</label>
                             <select id="upload_assign_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="type">
                                 <!-- CONTENT DROPDOWN -->
                                 <option value="exam">Ujian</option>
                                 <option value="task">Tugas</option>
                                 <option value="try out">Try Out</option>

                             </select>
                         </div>
                         <!-- TOMBOL UPLOAD FILE -->
                         <div class="mb-3">
                             <label class="block mb-2 text-sm font-bold text-dark-900 dark:text-dark-300">Dokumen</label>
                             <input type="file" id="upload_file" name="dokumen" accept=".png,.jpg,.jpeg,.txt,.pdf,.doc,.xls,.ppt,.docx,.xlsx,.pptx,.zip,.rar" required>
                         </div>
                         <!-- CRITERIA FILE UPLOAD -->
                         <p class="text-sm text-gray-400 font-base">*Format File .png .jpg .jpeg .txt .pdf .doc .xls .ppt .docx .xlsx .pptx .zip .rar</p>
                         <p class="text-sm text-gray-400 font-base">*Maksimum File 2 MB</p>

                 </div>
                 <div class="px-5">
                     <div class="progress hidden w-full bg-gray-200 rounded-full dark:bg-gray-700 " id="progressup">
                         <div id="progressbarup" class="bg-dark-green text-xs font-medium text-white text-center p-0.5 leading-none rounded-full">0%</div>
                     </div>
                 </div>

                 <!-- Modal Add footer -->
                 <div class="flex justify-end p-6 space-x-2 rounded-b border-gray-200 dark:border-gray-600">
                     <!-- TOMBOL CLOSE -->
                     <button data-modal-toggle="addModal" type="button" class="text-gray-500 focus:ring-4 focus:outline-none focus:ring-blue-300 hover:ring-2 hover:ring-gray-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-transparent dark:focus:ring-dark-800" id="btnClsUp">Tutup</button>
                     <!-- TOMBOL UPLOAD -->
                     <button type="submit" class="text-white bg-cream focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm font-medium px-5 py-2.5 hover:bg-gray-600 hover:text-white focus:z-10 dark:bg-[#DDB07F] dark:text--300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600" name="upload" id="btnUpload">Upload</button>
                     <!-- FUNGSI DISABLE BUTTON -->
                     <button disabled type="button" id="loading" class="hidden text-white bg-cream rounded font-medium ml-auto py-2 px-2 items-center">
                         <svg role="status" class="inline w-4 h-4 mr-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                             <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB" />
                             <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor" />
                         </svg>
                         Uploading...
                     </button>
                 </div>
                 </form>
             </div>
         </div>
     </div>

     <!-- Table Assignment -->
     <div class="relative">
         <!-- Alert Success -->
         <?php if ($this->session->flashdata('success')) : ?>
             <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                 <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                     <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                 </svg>
                 <span class="sr-only">Info</span>
                 <div class="ms-3 text-sm font-medium">
                     Yeayy!! <?= $this->session->flashdata('success') ?>
                 </div>
                 <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                     <span class="sr-only">Close</span>
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                     </svg>
                 </button>
             </div>
         <?php endif ?>

         <?php if ($this->session->flashdata('fail')) : ?>
             <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                 <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                     <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                 </svg>
                 <span class="sr-only">Info</span>
                 <div class="ms-3 text-sm font-medium">
                     Maaf <?= $this->session->flashdata('fail') ?>
                 </div>
                 <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
                     <span class="sr-only">Close</span>
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                     </svg>
                 </button>
             </div>
         <?php endif ?>

         <table class="shadow-lg bg-white" style="width: 100%">
             <colgroup>
                 <col span="1" style="width: 30%">
                 <col span="1" style="width: 10%">
                 <col span="1" style="width: 10%">
                 <col span="1" style="width: 15%">

             </colgroup>
             <thead class="thead">
                 <tr class="text-dark-green text-sm lg:text-base">
                     <th class="border-b text-left px-4 py-2">Judul</th>
                     <th class="border-b text-center px-4 py-2">Batas Tanggal</th>
                     <th class="border-b text-center px-4 py-2">Batas Waktu</th>
                     <th class="border-b text-center px-4 py-2">Aksi</th>
                 </tr>
             </thead>
             <tbody>
                 <?php $count = 1; ?>
                 <?php foreach ($assignment as $item) : ?>
                     <?php

                        $arrStartDate = explode(" ", $item->assignment_start_date);
                        $arrEndDate = explode(" ", $item->assignment_end_date);

                        // var_dump($arrEndDate);
                        $startDate = $arrStartDate[0];
                        $dueDate = $arrEndDate[0];
                        $dueTime = date("H:i", strtotime($arrEndDate[1]));

                        ?>
                     <tr class="text-sm lg:text-base">
                         <td class="border-b px-4 py-2 ">
                             <div class="flex items-center gap-x-2">
                                 <p class="truncate max-w-[300px]" data-tooltip-target="tooltipassignment"> <?= $item->assignment_name; ?></p>
                                 <a href="#">
                                     <img class="Desc w-3 sm:w-5 cursor-pointer" data-tooltip-target="tooltipDesc" src="<?= base_url('assets/') ?>Img/icons/detail_icon.svg" alt="Download Icon" type="button" data-modal-toggle="medium-modal<?= "medium-modal" . $item->assignment_id ?>" id="showDesc" data-desc="<?= $item->assignment_desc ?>">
                                 </a>
                             </div>
                             <div id="tooltipDesc" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-600 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark-bg-cream ">
                                 Deskripsi Tugas
                                 <div class="tooltip-arrow" data-popper-arrow></div>
                             </div>
                         </td>
                         <td class="border-b px-4 py-2 text-center"><?= $dueDate ?></td>
                         <td class="border-b px-4 py-2 text-center"><?= $dueTime ?> WIB</td>
                         <td class="border-b px-4 py-2 flex flex-wrap items-center justify-center gap-x-2 ">
                             <!-- COLLECTION -->
                             <a href="<?= site_url('mentor/assignment_collection/'.$this->uri->segment(3).'/'.$item->assignment_name.'/'.$item->assignment_id) ?>">
                                 <img class="Collect w-5 sm:w-7 cursor-pointer" data-tooltip-target="tooltipCollect" src="<?= base_url('assets/') ?>img/icons/binoculars_icon.svg" alt="Assignment Collection Icon" type="button">
                             </a>
                             <div id="tooltipCollect" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-cream rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark-bg-cream ">
                                 Kumpulan Tugas
                                 <div class="tooltip-arrow" data-popper-arrow></div>
                             </div>
                             <!-- EDIT -->
                             <a>
                                 <img class="Edit w-5 sm:w-7 cursor-pointer" data-tooltip-target="tooltipEdit" src="<?= base_url('assets/') ?>img/icons/edit_icon.svg" alt="Assignment Collection Icon" type="button" data-modal-toggle="defaultModal<?= $item->assignment_id ?>">
                             </a>
                             <div id="tooltipEdit" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-cream rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark-bg-cream ">
                                 Edit
                                 <div class="tooltip-arrow" data-popper-arrow></div>
                             </div>
                             <!-- DELETE -->
                             <a href="<?= site_url('mentor/delete_task/' . $item->assignment_id . '/' . $this->uri->segment(3)) ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" type="button">
                                 <img class="Delete w-5 sm:w-7 cursor-pointer" data-tooltip-target="tooltipDelete" src="<?= base_url('assets/') ?>img/icons/delete_icon.svg" alt="Delete Icon">
                             </a>
                             <div id="tooltipDelete" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-cream rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark-bg-cream ">
                                 Hapus
                                 <div class="tooltip-arrow" data-popper-arrow></div>
                             </div>
                         </td>
                     </tr>

                     <?php $count++ ?>

                     <div id="defaultModal<?= $item->assignment_id ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-screen md:h-full">
                         <div class="relative p-4 w-full max-w-2xl h-full">
                             <!-- Modal Add content -->
                             <div class="relative bg-white rounded-lg shadow ">
                                 <!-- Modal Add header -->
                                 <div class="flex justify-center items-start p-4 rounded-t">
                                     <h3 class="text-xl font-semibold text-gray-900 lg:text-2xl dark:text-dark">
                                         Edit Tugas
                                     </h3>
                                 </div>
                                 <!-- Modal Add body -->
                                 <div class="p-4 space-y-6">
                                     <!-- CONTENT FORM TAMBAH ASSIGNMENT BARU -->
                                     <form method="POST" action="<?= site_url('mentor/edit_task/'.$item->assignment_id.'/'.$this->uri->segment(3))?>" enctype="multipart/form-data">
                                         <div class="mb-6">
                                             <label for="upload_title" class="block mb-2 text-sm font-bold text-dark-900 dark:text-dark-300">Judul</label>
                                             <input type="text" id="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500" required name="title" value="<?=$item->assignment_name?>">
                                         </div>
                                         <!-- LABEL START DATE -->
                                         <div class="mb-6">
                                             <label for="upload_startDate" class="block mb-2 text-sm font-bold text-dark-900 dark:text-dark-300">Waktu Dimulai</label>
                                             <input type="datetime-local" id="upload_startDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500" required name="start-date" value="<?=$item->assignment_start_date?>">
                                         </div>
                                         <!-- LABEL DUE DATE -->
                                         <div class="mb-6">
                                             <label for="upload_dueDate" class="block mb-2 text-sm font-bold text-dark-900 dark:text-dark-300">Batas Waktu</label>
                                             <input type="datetime-local" id="upload_dueDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500" required name="end-date" value="<?=$item->assignment_end_date?>">
                                         </div>
                                         <!-- LABEL DESKRIPSI -->
                                         <div class="mb-6">
                                             <label for="upload_deksripsi" class="block mb-2 text-sm font-bold text-dark-900 dark:text-dark-300">Deskripsi</label>
                                             <textarea id="deskripsi" rows="4" class="block p-2.5 w-full text-sm text-dark-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-white-700 dark:border-gray-300 dark:placeholder-gray-400 dark:text-dark dark:focus:ring-blue-500 dark:focus:border-blue-500" name="desc"><?=$item->assignment_desc?></textarea>
                                         </div>
                                         <!-- LABEL DROPDOWN TIPE ASSIGNMENT -->
                                         <div class="mb-6">
                                             <label for="upload_assign_type" class="block mb-2 text-sm font-bold text-dark-900 dark:text-dark-300">Tipe Tugas</label>
                                             <select id="upload_assign_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="type">
                                                 <!-- CONTENT DROPDOWN -->
                                                 <option value="exam" <?= $item->assignment_type == "exam" ? "selected" : "" ?>>Ujian</option>
                                                 <option value="task" <?= $item->assignment_type == "task" ? "selected" : "" ?>>Tugas</option>
                                                 <option value="try out" <?= $item->assignment_type == "try out" ? "selected" : "" ?>>Try Out</option>

                                             </select>
                                         </div>
                                         <!-- TOMBOL UPLOAD FILE -->
                                         <div class="mb-3">
                                             <label class="block mb-2 text-sm font-bold text-dark-900 dark:text-dark-300">Dokumen</label>
                                             <input type="file" id="upload_file" name="dokumen" accept=".png,.jpg,.jpeg,.txt,.pdf,.doc,.xls,.ppt,.docx,.xlsx,.pptx,.zip,.rar">
                                         </div>
                                         <!-- CRITERIA FILE UPLOAD -->
                                         <p class="text-sm text-gray-400 font-base">*Format File .png .jpg .jpeg .txt .pdf .doc .xls .ppt .docx .xlsx .pptx .zip .rar</p>
                                         <p class="text-sm text-gray-400 font-base">*Maksimum File 2 MB</p>

                                 </div>
                                 <div class="px-5">
                                     <div class="progress hidden w-full bg-gray-200 rounded-full dark:bg-gray-700 " id="progressup">
                                         <div id="progressbarup" class="bg-dark-green text-xs font-medium text-white text-center p-0.5 leading-none rounded-full">0%</div>
                                     </div>
                                 </div>

                                 <!-- Modal Add footer -->
                                 <div class="flex justify-end p-6 space-x-2 rounded-b border-gray-200 dark:border-gray-600">
                                     <!-- TOMBOL CLOSE -->
                                     <button data-modal-hide="defaultModal<?= $item->assignment_id ?>" type="button" class="text-gray-500 focus:ring-4 focus:outline-none focus:ring-blue-300 hover:ring-2 hover:ring-gray-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-transparent dark:focus:ring-dark-800">Tutup</button>
                                     <!-- TOMBOL UPLOAD -->
                                     <button type="submit" class="text-white bg-cream focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm font-medium px-5 py-2.5 hover:bg-gray-600 hover:text-white focus:z-10 dark:bg-[#DDB07F] dark:text--300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600" name="upload" id="btnUpload">Upload</button>
                                     <!-- FUNGSI DISABLE BUTTON -->
                                     <button disabled type="button" id="loading" class="hidden text-white bg-cream rounded font-medium ml-auto py-2 px-2 items-center">
                                         <svg role="status" class="inline w-4 h-4 mr-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB" />
                                             <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor" />
                                         </svg>
                                         Uploading...
                                     </button>
                                 </div>
                                 </form>
                             </div>
                         </div>
                     </div>

                 <?php endforeach ?>
             </tbody>
         </table>
     </div>

 </div>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.0/flowbite.min.js"></script>