<script setup>

     import { Link } from '@inertiajs/vue3';
     import { ref,watch } from 'vue';
     import { router } from '@inertiajs/vue3';
     import Pagination from '@/Components/Pagination.vue';
     import AgentLayout from '../../Layouts/AgentLayout.vue';

    const props = defineProps({
      agentSubs : Object,
      filters: Object 
     })

     const search = ref(props.filters.search);
const perPage = ref(props.filters.perPage);


watch(search, value => {
       router.get('/agent/submissions', {search: value, perPage: perPage.value},{
          preserveState : true,
          replace :true,
          preserveScroll: true
       });
})

function getPage(){
  router.get('/agent/submissions', {search: search.value, perPage: perPage.value},{
          preserveState : true,
          replace :true,
          preserveScroll: true
       });
}




</script>


<template>
    <AgentLayout>
      <section class="min-h-[90vh] bg-blue-50 shadow-xl p-4 ">
        <h2 class="p-3 m-1 text-center rounded-lg bg-indigo-600 text-white font-extrabold text-2xl">File Submission List</h2>
    
        <div class="w-full overflow-x-auto shadow-xl rounded-xl ">
                          
            <div class="flex justify-between my-1  gap-5  p-3">

              <!-- Search Input And Pagination Input -->

              <div class="relative text-gray-600 focus-within:text-gray-400">
                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                    <i class="fa-solid fa-magnifying-glass py-2 px-3"></i>
                </span>
                <input  type="search" v-model="search" name="q" class="py-2 px-8 text-sm text-gray-800 bg-blue-50 rounded-lg pl-10 focus:outline-none focus:bg-white focus:text-gray-900 " placeholder="Search..." autocomplete="off">
              </div>

               <select  v-model="perPage" @change="getPage()"  class="mt-1 block w-24 px-3 py-1 rounded-lg" >
                      <option value="5" > <b>Per 5</b> </option>
                      <option value="10" > <b>Per 10</b> </option>
                      <option value="20"> <b>Per 20</b> </option>
                      <option value="50"> <b>Per 50</b> </option>
                      <option value="100"> <b>Per 100</b> </option>
               </select>
            </div>

              <table class="w-full" >
                <thead >
                  <tr  class="text-sm font-semibold tracking-wide text-left text-gray-900 bg-gray-100 capitalize border-b border-gray-600">
                    <th scope="col" class="px-4 py-2"> Id </th>
                    <th scope="col" class="px-4 py-2"> name </th>
                    <th scope="col" class="px-4 py-2">Date Of Birth </th>
                    <th scope="col" class="px-4 py-2">Gender</th>
                    <th scope="col" class="px-4 py-2">Nationality</th>
                    <th scope="col" class="px-4 py-2">Author</th>
                    <th scope="col" class="px-4 py-2">Create date</th>
                    <th scope="col" class="px-4 py-2">Action</th>
                  </tr>
                </thead>
                <tbody class="bg-white" >
                  <tr v-for="(sub, index) in props.agentSubs.data"  class="text-gray-700">
                    <td class="px-4 py-2 border">{{sub.id }} </td>
                    <td class="px-4 py-2 border"> {{ sub.name }} </td>
                    <td class="px-4 py-2 border"> {{ sub.dob }} </td>
                    <td class="px-4 py-2 border"> {{ sub.gender }} </td>
                    <td class="px-4 py-2 border"> {{ sub.nationality }} </td>
                    <td class="px-4 py-2 border"> {{ sub.user }} </td>
                    <td class="px-4 py-2 border"> {{ sub.created_at }} </td>
                    <td class="px-4 py-2 border ">
                      <div class="flex justify-start items-center gap-3 lg:gap-1">
                     <div>  <Link :href="route('agent.submissions.show',sub.id)" class="btn-show"> <i class="fa-solid fa-eye"></i></Link></div>
                     <div>  <Link :href="route('agent.submissions.edit',sub.id)" class="btn-edit"> <i class="fa-solid fa-pen-to-square"></i></Link></div>
                     <div> <a :href="route('web.view.pdf',sub.id)" class="btn-view"> <i class="fa-solid fa-file-pdf"></i> </a></div>
                     <div> <a :href="route('web.download.pdf',sub.id)" class="btn-download"> <i class="fa-solid fa-file-arrow-down"></i> </a></div>
                      <Link :href="route('agent.submissions.destroy',sub.id)" onclick="return confirm('Are you sure you want to delete this item?');" as="button" type="button" method="delete" class="btn-delete"> <i class="fa-solid fa-trash"></i></Link>
                      </div>
                  </td>
                  </tr>

                 
             
                </tbody>
               
              </table>
             <Pagination :links="props.agentSubs.meta.links"/>
         
            </div> 
    </section>
    </AgentLayout>
</template>

