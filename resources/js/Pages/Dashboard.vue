<script setup>
 import AdminLayout from '../Layouts/AdminLayout.vue';
 import { Link } from '@inertiajs/vue3';

const props = defineProps({
        agents : String,
        totalSub : String
})
</script>


<template>
    <AdminLayout>
           <section class="min-h-[85vh] bg-blue-50 shadow-lg p-5">
                 <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
                       <div class="h-28 bg-white shadow-md p-4 rounded-lg">
                       <Link :href="route('admin.agents.index')">
                            <h3 class="m-1 p-2 font-bold"><i class="fa-solid fa-user-secret text-lg"></i> Agents ({{ props.agents }}) </h3>
                            <p class="m-1 ">
                                   There Only Active Agent 
                            </p>
                     </Link>
                       </div>
                    
                       <div class="h-28 bg-white shadow-md p-4 rounded-lg">
                        <Link :href="route('admin.submissions.index')">
                            <h3 class="m-1 p-2 font-bold"><i class="fa-solid fa-file text-lg"></i> Submission ({{ props.totalSub }}) </h3>
                            <p class="m-1 ">
                                   There Total Submission 
                            </p>
                     </Link>
                       </div>
                      
                 </div>
           </section>
    </AdminLayout>
</template>