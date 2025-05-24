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

     <!-- Direction -->
     <!-- <div class="bg-white w-full p-6 direction course-title">
         <p class="text-dark-green font-semibold text-sm lg:text-base">Deskripsi :</p>
         <p class="text-sm lg:text-base"></p>
     </div> -->

     <!-- Table Assignment -->
     <div class="relative ">
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

                             <a href="<?= base_url('assets/upload/assignment_questions/' . $item->question_filename) ?>">
                                 <img class="Download w-5 sm:w-7 cursor-pointer" data-tooltip-target="tooltipDownload" src="<?= base_url('assets/') ?>Img/icons/download_icon.svg" alt="Download Icon">
                             </a>
                             <div id="tooltipDownload" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-gray-700 bg-gray-300 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark-bg-cream ">
                                 Unduh Soal
                                 <div class="tooltip-arrow" data-popper-arrow></div>
                             </div>

                             <?php
                                $now = date('Y-m-d'); ?>

                             <?php if (strtotime($now) > strtotime($dueDate)) { ?>
                                 <!-- print('Melebihi deadline'); -->

                                 <img class="Upload w-5 sm:w-7 " data-tooltip-target="tooltip-default1" src="<?= base_url('assets/') ?>Img/icons/create_iconred.svg" alt="Create Icon" name="btnup" id="btnup">
                                 <div id="tooltip-default1" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-red-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-red-700">
                                     Tugas ini sudah melewati batas waktu pengumpulan
                                     <div class="tooltip-arrow" data-popper-arrow></div>
                                 </div>
                             <?php } else { ?>
                                 <!-- print('Upload tugas pertama'); -->
                                 <img class="Upload w-5 sm:w-7 cursor-pointer modalUpload" data-tooltip-target="tooltipUpload" src="<?= base_url('assets/') ?>Img/icons/create_icon.svg" alt="Create Icon" type="button" data-modal-toggle="modalAdd<?= $count ?>" data-assignid="<?= $item->assignment_id; ?>">
                                 <div id="tooltipUpload" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-gray-700 bg-gray-300 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark-bg-cream ">
                                     Upload Tugas
                                     <div class="tooltip-arrow" data-popper-arrow></div>
                                 </div>
                             <?php } ?>

                             <img class="History w-5 sm:w-7 cursor-pointer" data-tooltip-target="tooltipHistory" src="<?= base_url('assets/') ?>Img/icons/history_icon.svg" alt="History Icon" type="button" data-modal-toggle="historymodal<?= $count ?>">
                             <div id="tooltipHistory" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-gray-700 bg-gray-300 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark-bg-cream ">
                                 Lihat Riwayat Upload
                                 <div class="tooltip-arrow" data-popper-arrow></div>
                             </div>
                         </td>
                     </tr>
                     <!-- modal ASSIGNMENT HISTORY -->
                     <div id="historymodal<?= $count ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                         <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
                             <!-- Modal content -->
                             <div class="relative bg-white rounded-lg shadow ">
                                 <!-- Modal header -->
                                 <div class="flex justify-center items-start p-5 rounded-t ">
                                     <h3 class="text-xl font-bold  lg:text-2xl text-dark-green">
                                         RIWAYAT UPLOAD
                                     </h3>
                                 </div>
                                 <!-- Modal body -->
                                 <div class="px-6 space-y-6">
                                     <div class="mb-6 relative overflow-x-auto sm:rounded-lg border border-gray-400 px-4 py-2">
                                         <div class="relative w-full text-sm text-left text-gray-500 dark:text-gray-400">

                                             <ul class="grid grid-cols-12 border-b border-gray-400 py-2">
                                                 <li><b>No</b></li>
                                                 <li class="col-span-5"><b>Waktu Pengumpulan</b></li>
                                                 <li class="col-span-5"><b>Judul</b></li>
                                                 <li><b>Files</b></li>
                                             </ul>

                                             <?php $no = 1;
                                                foreach ($assignment_submission as $submission) : ?>
                                                 <?php if ($submission->assignment_id == $item->assignment_id) : ?>
                                                     <ul class="grid grid-cols-12 border-b border-gray-400 py-2">
                                                         <li><?= $no ?></li>
                                                         <li class="col-span-5"><?= $submission->submitted_date ?></li>
                                                         <li class="col-span-5 truncate"><?= $submission->submission_filename ?></li>
                                                         <li><a href="<?= base_url('assets/upload/assignment_submissions/' . $submission->submission_filename) ?>" target="_blank"><img class=" w-7 mx-auto cursor-pointer" src="<?= base_url('assets/') ?>Img/icons/download_icon.svg" alt="Download Icon"></a></li>
                                                     </ul>
                                                     <?php $no++ ?>
                                                 <?php endif ?>
                                             <?php endforeach ?>
                                         </div>
                                     </div>
                                     <div class="flex justify-end p-6 space-x-3 rounded-b ">
                                         <button data-modal-toggle="historymodal<?= $count ?>" class="w-32 bg-cream text-center py-1 text-white rounded-md hover:bg-gray-600" type="button">Tutup</button>
                                     </div>

                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- END MODAL -->
                     <!-- Description Modal -->
                     <div id="medium-modal<?= "medium-modal" . $item->assignment_id ?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                         <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
                             <!-- Modal content -->
                             <div class="relative bg-white rounded-lg shadow ">
                                 <!-- Modal header -->
                                 <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                                     <h3 class="text-xl font-medium text-center">
                                         Deskripsi
                                     </h3>
                                     <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="medium-modal<?= "medium-modal" . $item->assignment_id ?>">
                                         <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                             <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                         </svg>
                                     </button>
                                 </div>
                                 <!-- Modal body -->
                                 <div class="p-6 space-y-6">
                                     <p class="text-base leading-relaxed">
                                         <?= $item->assignment_desc ?>
                                     </p>
                                 </div>
                                 <!-- Modal footer -->
                                 <div class="flex justify-end p-6 space-x-2 rounded-b border-gray-200 dark:border-gray-600">
                                     <button data-modal-toggle="medium-modal<?= "medium-modal" . $item->assignment_id ?>" type="button" class="text-gray bg-cream focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-transparent hover:text-white hover:bg-gray-600 dark:focus:ring-dark-800">Tutup</button>
                                     <!-- <button data-modal-toggle="medium-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button> -->
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- END MODAL -->
                     <!-- Main modal -->
                     <div id="modalAdd<?= $count ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                         <div class="relative w-full max-w-sm max-h-sm h-full lg:h-auto items-center">
                             <!-- Modal content -->
                             <div class="relative  bg-white rounded-lg shadow ">
                                 <!-- Modal header -->
                                 <div class="flex justify-center items-start p-5 rounded-t ">
                                     <h3 class="text-xl font-semibold text-gray-900 lg:text-2xl dark:text-dark">
                                         Upload Tugas
                                     </h3>
                                 </div>
                                 <!-- Modal body -->
                                 <div class="px-6 space-y-6" id="modalbdy">
                                     <form class="flex flex-col" action="<?= site_url('dashboard/upload_assignment/' . $this->uri->segment(3)) ?>" method="POST" enctype="multipart/form-data">
                                         <div class="mt-1 flex justify-center px-3 pt-4 pb-5 rounded-md gap-y-4 lg:py-[30px]">
                                             <div class="space-y-2 text-center">

                                                 <!-- UPLOAD ICON -->
                                                 <svg xmlns="http://www.w3.org/2000/svg" id="downloadIcon" class="mx-auto h-20 w-20 text-cream" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                     <path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                 </svg>
                                                 <!-- SELECTED ICON -->
                                                 <svg xmlns="http://www.w3.org/2000/svg" id="prevDoc" class="mx-auto h-20 w-20 hidden" viewBox="0 0 20 20" fill="#DDB07F">
                                                     <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd" />
                                                 </svg>
                                                 <!-- TEXT ICON -->
                                                 <p class="text-gray-600" id="countFile"></p>

                                                 <div class="flex text-lg text-gray-600">
                                                     <div class="container flex justify-center pl-10">
                                                         <input id="fileInput" name="file_tugas" class="px-4" type="file" data-assid="" accept=".png,.jpg,.jpeg,.txt,.pdf,.doc,.xls,.ppt,.docx,.xlsx,.pptx,.zip,.rar">
                                                     </div>
                                                     <input type="hidden" name="assignment_id" value="<?= $item->assignment_id ?>">
                                                 </div>
                                             </div>
                                         </div>
                                         <!-- CRITERIA FILE UPLOAD -->
                                         <p class="text-sm text-gray-400 font-base">*Format File .png .jpg .jpeg .txt .pdf .doc .xls .ppt .docx .xlsx .pptx .zip .rar</p>
                                         <p class="text-sm text-gray-400 font-base">*Maksimum File 2 MB</p>

                                         <div class="flex justify-end p-6 space-x-2 rounded-b border-gray-200 dark:border-gray-600">
                                             <button data-modal-toggle="modalAdd<?= $count ?>" type="button" class="text-gray-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm px-5 py-2.5 text-center hover:ring-2 hover:ring-gray-400" id="closeModal">Tutup</button>
                                             <button class=" bg-cream text-white w-[120px] py-2 rounded font-medium ml-auto hover:bg-gray-600" type="submit" name="submit" id="uploadSubmission">Kirim</button>
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
                     </div>
                     <?php $count++ ?>
                     <!-- END MAIN MODAL -->
                 <?php endforeach ?>
             </tbody>
         </table>
     </div>

 </div>