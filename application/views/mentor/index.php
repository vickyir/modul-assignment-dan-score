 <!-- Right side -->
 <div class="bg-cgray w-full h-screen px-10 py-6 flex flex-col gap-y-6 overflow-y-scroll">
     <!-- Header / Profile -->
     <div class="items-center gap-x-4 justify-end hidden sm:flex">
         <img class="w-10" src="<?= base_url('assets/') ?>img/icons/default_profile.svg" alt="Profile Image">
         <p class="text-dark-green font-semibold"><?= $this->session->userdata('username') ?></p>
     </div>

     <!-- Breadcrumb -->
     <div class="p-2 lg:p-4">
         <ul class="flex items-center gap-x-4 text-xs lg:text-base">
             <!-- NAVIGATOR HALAMAN HOME -->

             <li>
                 <a class="text-light-green hover:text-dark-green hover:font-semibold" href="#">Beranda</a>
             </li>

             <li>
                 <span class="text-light-green">/</span>
             </li>
             <!-- NAVIGATOR HALAMAN COURSES -->

             <li>
                 <a class="text-dark-green font-semibold" href="#">Batch</a>
             </li>
         </ul>
     </div>
     <!-- FUNGSI DROPDOWN UNTUK MENYELEKSI PERIODE COURSES -->

     <div class="container p-2 lg:p-4 rounded">
         <div class="container" style="display: table;">
             <div class="flex flex-col md:flex-row md:items-center md:space-x-2 gap-y-2">
                 <p class="font-bold">Periode :</p>
                 <!-- CONTENT DROPDOWN -->

                 <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block flex-1  p-2.5">
                     <?php foreach ($batch as $item) : ?>
                         <option value="<?= $item->batch_id ?>"><?= $item->batch_name ?></option>
                     <?php endforeach ?>
                     <!-- <option value="US">Filter 2</option>
                            <option value="US">Filter 3</option> -->
                 </select>
             </div>
         </div>
     </div>
     <!-- TITLE -->

     <div class="p-2 lg:p-4">
         <p class="text-lg md:text-xl lg:text-2xl xl:text-4xl text-dark-green font-semibold">Daftar Moduls</p>
     </div>

     <div class="p-2 lg:p-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">

         <?php foreach ($modul as $item) : ?>
             <a href="<?= site_url('mentor/modul_detail/' . $item->id) ?>" class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 w-100">
                 <h5 class="mb-2 text-lg lg:text-2xl font-bold tracking-tight text-gray-900 line-clamp-1 sm:line-clamp-2 truncate..."><?= $item->modul_name ?></h5>
                 <p class="font-normal text-gray-700 flex flex-row items-center gap-4 mt-5">
                     <img src="<?= base_url('assets/') ?>img/icons/dokumen_icon.svg" alt="dokumen"> <?= $item->id ?>
                 </p>
             </a>
         <?php endforeach ?>
     </div>
 </div>
