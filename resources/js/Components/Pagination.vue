<template>

    <div class="flex justify-center mt-5 p-2">
                
           <div v-if="links.length > 3">
            
                        <Link v-for="(link, key) in links" :key="key" preserve-scroll :href="link.url" v-html="link.label" class="bg-gray-50 px-2 py-1 border border-indigo-900 rounded-2xl" :class="{'bg-green-200' : link.active}"/>
            
           </div>
    </div>
    
    </template>

    
    <script setup>
             import { Link } from '@inertiajs/vue3';
              defineProps({
                  links : Object
              })
    </script>