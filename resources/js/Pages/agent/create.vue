<script setup>
    import { Head, Link, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AgentLayout from '../../Layouts/AgentLayout.vue';
import { ref } from 'vue';
import {useToastr} from '../../toastr.js';



 const toastr = useToastr();
const props = defineProps({
    certificate_no : Number,
    centers : Array
})

const form = useForm({
    certificate_no : props?.certificate_no,
    national_id : '',
    birth_certificate : '',
    nationality : 'Bangladeshi',
    passport_no : '',
    name : '',
    dob : '',
    gender : 'Male',
    first_dose_date : '',
    first_dose_name : 'Pfizer (Pfizer-BioNTech)',
    first_dose_other_name : '',
    second_dose_date : '',
    second_dose_name : 'Pfizer (Pfizer-BioNTech)',
    second_dose_other_name 	: '',
    third_dose_date : '',
    third_dose_name : 'Pfizer (Pfizer-BioNTech)',
    third_dose_other_name : '',
    total : '',
    vaccine_center : 'Dhaka Medical College Hospital',
    fourth_dose_date : '',
     fourth_dose_name : 'Pfizer (Pfizer-BioNTech)',
     fourth_dose_other_name : '',
     other_center : ''
})

const nid_tog = ref(true);






const submit = ()=> {
    form.post(route("agent.submissions.store"),{
          onSuccess: ()=> cleanForm ()
    });
}

function cleanForm(){
    form.reset();
    toastr.success("Submission Add Successfully");
}



</script>


<template>
            <AgentLayout>
 <section class="min-h-[90vh] max-w-7xl mx-auto bg-indigo-50 p-3 shadow-lg ">
   
<form @submit.prevent="submit">
         

            
    <div class="grid md:grid-cols-2 md:gap-6 p-5">

         <div>
            <h3 class="text-2xl my-3 p-4 font-extrabold rounded-lg  text-gray-800">
                Beneficiary Information
                {{ message }}
             </h3>
            <div class="mb-3">
                <InputLabel for="certificate_no" value="Certificate No *" />
                <TextInput id="certificate_no" v-model="form.certificate_no" disabled  type="text" class="form-control bg-slate-200" placeholder="Enter Certificate No "  />
                <InputError class="mt-2" :message="form.errors.certificate_no" />
            </div>

       

<!-- Birth Id No and Nid No -->

<ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white mb-3">
    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
        <div class="flex items-center pl-3">
            <input id="horizontal-list-radio-license" @click="nid_tog = true" type="radio" value="" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
            <label for="horizontal-list-radio-license" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nid No </label>
        </div>
    </li>
    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
        <div class="flex items-center pl-3">
            <input id="horizontal-list-radio-id" type="radio" value=""  @click="nid_tog = false" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
            <label for="horizontal-list-radio-id" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Birth No</label>
        </div>
    </li>
 
</ul>





    
            <div v-if="nid_tog == true" class="mb-3">
                <InputLabel for="national_id" value="National Id" />       
                <TextInput   id="national_id" v-model="form.national_id"  type="text" class="form-control" placeholder="Enter National ID"  />
                <InputError class="mt-2" :message="form.errors.national_id" />
            </div>
           
            <div v-if="nid_tog == false"  class="mb-3">
                <InputLabel for="birth_certificate" value="Birth Certificate NO" />
                <TextInput id="birth_certificate" v-model="form.birth_certificate"  type="text" class="form-control" placeholder="Birth Certificate No"  />
                <InputError class="mt-2" :message="form.errors.birth_certificate" />
            </div>
            <div class="mb-3">
                <InputLabel for="nationality" value="Nationality *" />
                <TextInput id="nationality" v-model="form.nationality"  type="text" class="form-control" placeholder="Enter Nationality"/>
                <InputError class="mt-2" :message="form.errors.nationality" />
            </div>
    
            <div class="mb-3">
                <InputLabel for="passport_no" value="Passport No" />
                <TextInput id="passport_no" v-model="form.passport_no"  type="text" class="form-control" placeholder="Enter Passport No"/>
                <InputError class="mt-2" :message="form.errors.passport_no" />
            </div>
    
            <div class="mb-3">
                <InputLabel for="name" value="Name " />
                <TextInput id="name"  v-model="form.name" type="text" class="form-control" placeholder="Enter Name"  />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>
    
            <div class="mb-3">
                <InputLabel for="dob" value="Date Of Birth " />
          
                <TextInput id="dob"  v-model="form.dob" type="text" class="form-control" placeholder="dd-mm-yy"/>
                <InputError class="mt-2" :message="form.errors.dob" />
           
            </div>
    
            <div class="mb-3">
                <InputLabel for="gender" value="Gender *" />
                <select id="gender" v-model="form.gender" class="form-control">
                      <option value="Male" selected>Male</option>
                      <option value="Female">Female</option>
                      <option value="Other">Other</option>
                </select>
                <InputError class="mt-2" :message="form.errors.gender" />
            </div>
         </div>

      

         <div>
            <h3 class="text-2xl my-3 p-4  font-extrabold rounded-lg text-gray-800">
                Vaccination Details
               
             </h3>
            <div class="mb-3">
                <InputLabel for="first_dose_date" value="Data Of Vaccination (Dose 1)" />
                <TextInput id="first_dose_date"  v-model="form.first_dose_date" type="text" class="form-control" placeholder="dd-mm-yy"/>
                  <InputError class="mt-2" :message="form.errors.first_dose_date" />
               
                  
              </div>
      
              <div class="mb-3">
                  <InputLabel for="first_dose_name" value="Vaccine Name (Dose 1)" />
                  <select  v-model="form.first_dose_name" class="form-control" >
                     
                        <option value="Pfizer (Pfizer-BioNTech)">Pfizer (Pfizer-BioNTech)</option>
                        <option value="Moderna (Moderna)">Moderna (Moderna)</option>
                        <option value="Vero Cell (Sinopharm)">Vero Cell (Sinopharm)</option>
                        <option value="AstraZeneca (AstraZeneca)">AstraZeneca (AstraZeneca)</option>
                        <option value="SINOVAC (SINOVAC)">SINOVAC (SINOVAC)</option>
                        <option value="COVISHIELD (Astrazeneca)">COVISHIELD (Astrazeneca)</option>
                        <option value="Cominry (Cominry)">Cominry (Cominry)</option>
                        <option value="Other">Other</option>
                        <option value="N/A">N/A</option>
                       
                  </select>
                  <InputError class="mt-2" :message="form.errors.first_dose_name" />
              </div>
      
              <div v-if="form.first_dose_name == 'Other'" class="mb-3">
                <InputLabel for="first_dose_other_name" value="Other Vaccine Name (Dose 1)  " />
                <TextInput id="first_dose_other_name"  v-model="form.first_dose_other_name" type="text" class="form-control" placeholder="Other Vaccine Name (Dose 1) "/>
                <InputError class="mt-2" :message="form.errors.first_dose_other_name" />
             
            </div>
              
              <div class="mb-3">
                  <InputLabel for="second_dose_date" value="Data Of Vaccination (Dose 2)" />
                  <TextInput id="second_dose_date"  v-model="form.second_dose_date" type="text" class="form-control" placeholder="dd-mm-yy"/>
                  <InputError class="mt-2" :message="form.errors.second_dose_date" />
               
              </div>
      
              <div class="mb-3">
                  <InputLabel for="second_dose_name" value="Vaccine Name (Dose 2)" />
                  <select id="second_dose_name" v-model="form.second_dose_name" class="form-control">
                      
                      <option value="Pfizer (Pfizer-BioNTech)">Pfizer (Pfizer-BioNTech)</option>
                      <option value="Moderna (Moderna)">Moderna (Moderna)</option>
                      <option value="Vero Cell (Sinopharm)">Vero Cell (Sinopharm)</option>
                      <option value="AstraZeneca (AstraZeneca)">AstraZeneca (AstraZeneca)</option>
                      <option value="SINOVAC (SINOVAC)">SINOVAC (SINOVAC)</option>
                      <option value="COVISHIELD (Astrazeneca)">COVISHIELD (Astrazeneca)</option>
                      <option value="Cominry (Cominry)">Cominry (Cominry)</option>
                      <option value="Other">Other</option>
                      <option value="N/A">N/A</option>
               
                  </select>
                  <InputError class="mt-2" :message="form.errors.second_dose_name" />
              </div>

              <div v-if="form.second_dose_name == 'Other'" class="mb-3">
                <InputLabel for="second_dose_other_name" value="Other Vaccine Name (Dose 2)  " />
                <TextInput id="second_dose_other_name"  v-model="form.second_dose_other_name" type="text" class="form-control" placeholder="Other Vaccine Name (Dose 2) "/>
                <InputError class="mt-2" :message="form.errors.second_dose_other_name" />
             
            </div>
      
              
              <div class="mb-3">
                  <InputLabel for="third_dose_date" value="Data Of Vaccination (Dose 3)" />
                  <TextInput id="dob"  v-model="form.third_dose_date" type="text" class="form-control" placeholder="dd-mm-yy"/>
                  <InputError class="mt-2" :message="form.errors.third_dose_date" />
               
              </div>
      
              <div class="mb-3">
                  <InputLabel for="third_dose_name" value="Vaccine Name (Dose 3)" />
                  <select id="third_dose_name" v-model="form.third_dose_name"  class="form-control">
                     
                      <option value="Pfizer (Pfizer-BioNTech)">Pfizer (Pfizer-BioNTech)</option>
                      <option value="Moderna (Moderna)">Moderna (Moderna)</option>
                      <option value="Vero Cell (Sinopharm)">Vero Cell (Sinopharm)</option>
                      <option value="AstraZeneca (AstraZeneca)">AstraZeneca (AstraZeneca)</option>
                      <option value="SINOVAC (SINOVAC)">SINOVAC (SINOVAC)</option>
                      <option value="COVISHIELD (Astrazeneca)">COVISHIELD (Astrazeneca)</option>
                      <option value="Cominry (Cominry)">Cominry (Cominry)</option>
                      <option value="Other">Other</option>
                      <option value="N/A">N/A</option>
                  </select>
                  <InputError class="mt-2" :message="form.errors.third_dose_name" />
              </div>

              <div v-if="form.third_dose_name == 'Other'" class="mb-3">
                <InputLabel for="third_dose_other_name" value="Other Vaccine Name (Dose 3)  " />
                <TextInput id="third_dose_other_name"  v-model="form.third_dose_other_name" type="text" class="form-control" placeholder="Other Vaccine Name (Dose 3) "/>
                <InputError class="mt-2" :message="form.errors.third_dose_other_name" />
             
            </div>
      
              <div class="mb-3">
                  <InputLabel for="fourth_dose_date" value="Data Of Vaccination (Dose 4)" />
                  <TextInput id="dob"  v-model="form.fourth_dose_date" type="text" class="form-control" placeholder="dd-mm-yy"/>
                  <InputError class="mt-2" :message="form.errors.fourth_dose_date" />
                 
              </div>
      
              <div class="mb-3">
                  <InputLabel for="fourth_dose_name" value="Vaccine Name (Dose 4)" />
                  <select id="fourth_dose_name" v-model="form.fourth_dose_name" class="form-control">
                      <option value="Pfizer (Pfizer-BioNTech)">Pfizer (Pfizer-BioNTech)</option>
                      <option value="Moderna (Moderna)">Moderna (Moderna)</option>
                      <option value="Vero Cell (Sinopharm)">Vero Cell (Sinopharm)</option>
                      <option value="AstraZeneca (AstraZeneca)">AstraZeneca (AstraZeneca)</option>
                      <option value="SINOVAC (SINOVAC)">SINOVAC (SINOVAC)</option>
                      <option value="COVISHIELD (Astrazeneca)">COVISHIELD (Astrazeneca)</option>
                      <option value="Cominry (Cominry)">Cominry (Cominry)</option>
                      <option value="Other">Other</option>
                      <option value="N/A">N/A</option>
                  </select>
                  <InputError class="mt-2" :message="form.errors.fourth_dose_name" />
              </div>

              <div v-if="form.fourth_dose_name == 'Other'" class="mb-3">
                <InputLabel for="fourth_dose_other_name" value="Other Vaccine Name (Dose 4)  " />
                <TextInput id="fourth_dose_other_name"  v-model="form.fourth_dose_other_name" type="text" class="form-control" placeholder="Other Vaccine Name (Dose 4) "/>
                <InputError class="mt-2" :message="form.errors.fourth_dose_other_name" />
             
            </div>

              <div class="mb-3">
                  <InputLabel for="vaccine_center" value="Vaccination Center" />
                  <select id="vaccine_center" v-model="form.vaccine_center" class="form-control">
                      
                     <option v-for="cent in centers" :key="cent" :value="cent"> {{ cent }} </option>
                     
                  </select>
                  <InputError class="mt-2" :message="form.errors.vaccine_center" />
              </div>
              <div v-if="form.vaccine_center == 'other' " class="mb-3">
                <InputLabel for="" value="Other Center " />
                <TextInput id="dob"  v-model="form.other_center" type="text" class="form-control" placeholder="Other Center"/>
             </div>
             
              <div class="mb-3">
                  <InputLabel for="total" value="Total Goes Given" />
                  <TextInput id="total" v-model="form.total"  type="number" min="1" class="form-control" placeholder="Total Goes Given"  />
                  <InputError class="mt-2" :message="form.errors.total" />
                 
              </div>
         </div>
       

        


    </div>
   
 <div class="text-center m-3">
    <PrimaryButton class=" bg-[#4e1bd0] hover:bg-[#6119d4] rounded-xl " :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
        <span class="mx-auto text-lg "> Submit</span>
      </PrimaryButton>
 </div>
  </form>
  
 </section>

</AgentLayout>
</template>