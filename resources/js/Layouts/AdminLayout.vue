<template>
    <div class="h-full  flex">
      <!-- Side bar -->
      <div class="w-[350px] h-full bg-indigo-200 text-gray-700 rounded-sm p-3" v-show="showSide">
        <div class="h-[50px]  flex justify-start   items-center rounded-lg">
          <div class="px-[20px] flex items-center justify-center">
             <img src="../../../public/image/logo.jpeg" alt="logo" class="w-10 h-10 p-1 bg-white rounded-full"> <span class="text-lg font-extrabold capitalize">{{ $page.props.auth.user.name }}</span> 
          </div>
        </div>
        <div class="min-h-[200vh]  py-[20px]  rounded-lg">
          <div class="flex flex-col justify-between h-full px-[10px] space-y-[10px]">
            <div class=" flex flex-col justify-between space-y-[10px]">
              <span class="text-md font-bold text-white">Menu</span>
              <Link :href="route('dashboard')" class="side-nav text-md" >
                <i class="fa-solid fa-gauge text-md mr-3"></i>
                Dashboard
              </Link>
             
              
              <Link :href="route('admin.lists.index')" class="side-nav text-md" >
                <i class="fa-solid fa-user-gear text-md mr-3"></i>
               Admin List
              </Link>

              <Link :href="route('admin.lists.create')" class="side-nav text-md" >
                <i class="fa-solid fa-user-pen text-md mr-3"></i>
               Admin Create
              </Link>

              <Link :href="route('admin.agents.index')" class="side-nav text-md" >
                <i class="fa-solid fa-user-secret text-md mr-3"></i>
               Agent List
              </Link>
              <Link :href="route('admin.agents.create')" class="side-nav text-md" >
                <i class="fa-solid fa-user-plus text-md mr-3"></i>
               Add Agent 
              </Link>

              <Link :href="route('admin.submissions.index')" class="side-nav text-md" >
                <i class="fa-solid fa-file text-md mr-3"></i>
              File Submission
              </Link>

              <Link :href="route('logout')" as="button" method="post" class="side-nav text-md">
                <i class="fa-solid fa-right-from-bracket mr-3"></i> Logout
              </Link>
  
            </div>
          
          </div>
        </div>
      </div>
      <div class="w-full h-full bg-gray-100 ">
        <div class="h-[50px] drop-shadow-md bg-gray-100 flex items-center shadow-sm px-[20px] w-full py-[10px] z-10 border-b ">
          <!-- Hamburger menu -->
          <div class="cursor-pointer w-[30px]" @click="toggleSideBar">
            <i class="fa-solid fa-bars text-lg"></i>
          </div>
        
  
          <div class="w-[calc(100%-30px)] flex justify-end z-50">
            
            <!-- User login -->
            <div class="w-[200px] ">
              <div class="flex items-center justify-start space-x-4" @click="toggleDrop">
                <img class="w-10 h-10 rounded-full border-2 border-gray-50" src="../../../public/image/logo.jpeg" alt="">
                <div class="font-semibold dark:text-white text-left">
                  <div class=" text-lg font-bold capitalize"> {{ $page.props.auth.user.name }} </div>
                  <div class="text-xs text-gray-500 dark:text-gray-400">Admin</div>
                </div>
              </div>
              <!-- Drop down -->
              <div v-show="showDropDown" class="absolute right-[10px] z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                <div class="py-1 text-left" role="none">
                
                
                  <Link :href="route('profile.show')" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2"> Profile</Link>
                  <Link :href="route('logout')" as="button" method="post" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2"> Logout</Link>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 p-[20px]">
           <slot/>
        </div>
      </div>
      <!-- Main  -->
    </div>
  </template>
  
  
 <script >
  import { Link } from '@inertiajs/vue3'
  export default {
   data() {
     return {
       showDropDown: false,
       showSide: true
     }
   },
   components:{
      Link
   },
   methods: {
     // hide show side bar
     toggleSideBar() {
       this.showSide = !this.showSide
 
     },
     // toggle user 
     toggleDrop() {
       this.showDropDown = !this.showDropDown
 
     }
   }
 
 }
 </script>

