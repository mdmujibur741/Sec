<template>
    <AdminLayout>
      <section class="min-h-[90vh] bg-blue-50 shadow-xl p-4 ">
        <h2 class="p-3 m-1 text-center rounded-lg bg-indigo-600 text-white font-extrabold text-2xl">Agent List</h2>
    
        <div class="w-full overflow-x-auto shadow-xl rounded-xl ">
                          
            <div class="flex justify-between my-1  gap-5  p-3">

              <!-- Search Input And Pagination Input -->

              <div class="relative text-gray-600 focus-within:text-gray-400">
                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                    <i class="fa-solid fa-magnifying-glass py-2 px-3"></i>
                </span>
                <input  type="search" v-model="search" name="q" class="py-2 px-8 text-sm text-gray-800 bg-blue-50 rounded-lg pl-10 focus:outline-none focus:bg-white focus:text-gray-900 " placeholder="Search..." autocomplete="off">
              </div>

               <select   v-model="perPage" class="mt-1 block w-24 px-3 py-1 rounded-lg" >
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
                    <th scope="col" class="px-4 py-2"> Name </th>
                    <th scope="col" class="px-4 py-2">Email </th>
                    <th scope="col" class="px-4 py-2">Mobile </th>
                    <th scope="col" class="px-4 py-2">Create Date </th>
                    <th scope="col" class="px-4 py-2">Active </th>
                    <th scope="col" class="px-4 py-2">Action</th>
                  </tr>
                </thead>
                <tbody class="bg-white" >
                  <tr v-for="(agent, index) in props.agents.data" :key="agent" class="text-gray-700">
                    <td class="px-4 py-2 border"> {{ index+1 }} </td>
                    <td class="px-4 py-2 border"> {{ agent.name }} </td>
                    <td class="px-4 py-2 border"> {{ agent.email }} </td>
                    <td class="px-4 py-2 border"> {{ agent.mobile }} </td>
                    <td class="px-4 py-2 border"> {{ agent.created_at }} </td>
                    <td class="px-4 py-2 border"> 
                     
                     
                      <div @click="ActiveStatus(agent.id)">
                        <input v-if="agent.status == 1"  class="switch" type="checkbox" checked  role="switch" id="index+1"   />
                        <input v-else  class="switch" type="checkbox" role="switch" id="index+1"   />  
                      </div> 
                  
                  
                    </td>
                    <td class="px-4 py-2 border ">
                      <div class="flex justify-start items-center gap-3 lg:gap-1">
                    
                     <div>  <Link :href="route('admin.agents.edit', agent.id)" class="btn-edit"> <i class="fa-solid fa-pen-to-square"></i></Link></div>
                      <Link :href="route('admin.agents.destroy', agent.id)" onclick="return confirm('Are you sure you want to delete this item?');" as="button" type="button" method="delete" class="btn-delete"> <i class="fa-solid fa-trash"></i></Link>
                      </div>
                  </td>
                  </tr>
             
                </tbody>
               
              </table>
             <Pagination :links="props.agents.meta.links"/>
         
            </div> 
    </section>
    </AdminLayout>
</template>

<script setup>
     import AdminLayout from '../../../Layouts/AdminLayout.vue';
     import { Link } from '@inertiajs/vue3';
     import { router } from '@inertiajs/vue3';
     import { ref,watch } from 'vue';
     import Pagination from "@/Components/Pagination.vue";
     const props = defineProps({
      agents : Object,
      filters : Object
     }) 

   
     const search = ref(props.filters.search);
const perPage = ref(props.filters.perPage);


watch(search, value => {
       router.get('/admin/agents', {search: value, perPage: perPage.value},{
          preserveState : true,
          replace :true,
          preserveScroll: true
       });
})

function getPage(){
  router.get('/admin/agents', {search: search.value, perPage: perPage.value},{
          preserveState : true,
          replace :true,
          preserveScroll: true
       });
}

function ActiveStatus($id){
    router.get(route('admin.agents.active.status',$id))
    preserveScroll : true
}

</script>