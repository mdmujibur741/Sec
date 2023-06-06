<script setup>
       import AgentLayout from '../../Layouts/AgentLayout.vue';

       const props = defineProps({
       submission : Object
       });
</script>
     
<template>

    <AgentLayout>
 
        <section class="min-h-[85vh] bg-blue-50 shadow-lg rounded-lg p-5 font-serif">
           
                    
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 m-3 p-3 ">
                    <div>
                        <h2 class="text-2xl font-bold my-4">Beneficiary Information</h2>
                       <div class=" m-2 border bg-white p-2 ">
                           <p class=" font-extrabold">Certificate No : {{props.submission.data[0].certificate_no}}</p>
                     </div>
                     <div v-if="props.submission.data[0].national_id > 0" class=" m-2 rounded-lg font-semibold border bg-white p-2">
                       <p>National Id : {{props.submission.data[0].national_id}} </p>
                   </div>
                   <div v-if="props.submission.data[0].national_id == 0" class=" m-2 rounded-lg font-semibold border bg-white p-2">
                       <p>Birth Certificate No : {{props.submission.data[0].birth_certificate}} </p>
                   </div>
                   <div v-if="props.submission.data[0].passport_no > 0" class=" m-2 rounded-lg font-extrabold border bg-white p-2">
                       <p>Passport No : {{props.submission.data[0].passport_no}} </p>
                   </div>
                   <div class=" m-2 rounded-lg font-extrabold border bg-white p-2">
                       <p>Nationality : {{props.submission.data[0].nationality}} </p>
                   </div>
                   <div class=" m-2 border bg-white p-2 rounded-lg font-semibold">
                       <p>Name : {{props.submission.data[0].name}} </p>
                   </div>
                   <div class=" m-2 border bg-white p-2 rounded-lg font-semibold">
                       <p>Date Of Birth : {{props.submission.data[0].dob}} </p>
                   </div>
                     
                   <div class=" m-2 border bg-white p-2 rounded-lg font-semibold">
                       <p>Gender : {{props.submission.data[0].gender}} </p>
                   </div>
                   </div>
                   
               

                 
                    <div>
                       <h2 class="text-2xl font-bold my-4">Vaccination Details</h2>
                       <div v-if="props.submission.data[0].first_dose_date !==null" class="m-2 border bg-white p-2 rounded-lg font-semibold">
                           <p>Fast Dose Date : {{props.submission.data[0].first_dose_date}} </p>
                       </div>
   
                       <div v-if="props.submission.data[0].first_dose_name !==null" class="m-2 border bg-white p-2 rounded-lg font-semibold">
                           <p> Fast Dose Name : {{props.submission.data[0].first_dose_name}} </p>
                       </div>
   
                       <div v-if="props.submission.data[0].second_dose_date !==null" class="m-2 border bg-white p-2 rounded-lg font-semibold">
                           <p>Second Dose Date : {{props.submission.data[0].second_dose_date}} </p>
                       </div>
                       <div v-if="props.submission.data[0].second_dose_name !==null" class="m-2 border bg-white p-2 rounded-lg font-semibold">
                           <p>Second Dose Name : {{props.submission.data[0].second_dose_name}} </p>
                       </div>
                       <div v-if="props.submission.data[0].third_dose_date !==null" class="m-2 border bg-white p-2 rounded-lg font-semibold">
                           <p>Third Dose Date : {{props.submission.data[0].third_dose_date}} </p>
                       </div>
                       <div v-if="props.submission.data[0].third_dose_name !==null" class="m-2 border bg-white p-2 rounded-lg font-semibold">
                           <p>Third Dose Name : {{props.submission.data[0].third_dose_name}} </p>
                       </div>
                       <div v-if="props.submission.data[0].fourth_dose_date !==null" class="m-2 border bg-white p-2 rounded-lg font-semibold">
                           <p>Fourth Dose Date : {{props.submission.data[0].fourth_dose_date}} </p>
                       </div>
                       <div v-if="props.submission.data[0].fourth_dose_name !== null" class="m-2 border bg-white p-2 rounded-lg font-semibold">
                           <p>Fourth Dose Name : {{props.submission.data[0].fourth_dose_name}} </p>
                       </div>
                       <div  class="m-2 border bg-white p-2 rounded-lg font-semibold">
                           <p>Vaccinated By : {{props.submission.data[0].vaccinated_by}} </p>
                       </div>
                       <div  class="m-2 border bg-white p-2 rounded-lg font-semibold">
                           <p>Vaccine Center : {{props.submission.data[0].vaccine_center}} </p>
                       </div>

                       <div v-if="props.submission.data[0].vaccine_center=='other'"  class="m-2 border bg-white p-2 rounded-lg font-semibold">
                        <p>Other Center : {{props.submission.data[0].other_center}} </p>
                    </div>
                       <div  class="m-2 border bg-white p-2 rounded-lg font-semibold">
                           <p>Total Dose : {{props.submission.data[0].total}} </p>
                       </div>
                       <div  class="m-2 border bg-white p-2 rounded-lg font-semibold">
                           <p>Author : {{props.submission.data[0].user}} </p>
                       </div>
                    </div>
                   
                </div>
                 
    
                  
               
             
               
        </section>

    </AgentLayout>


</template>