<template>
    <div>
        <div class="navbar border-bottom " style="color: #563d7c">
            <router-link  class="navbar-brand mr-auto" :to="{ name: 'home' }">Home</router-link>
            <router-link class = "btn nav-button" :to="{ name: 'about' }">About</router-link>
            <router-link class = "btn nav-button" :to="{ name: 'ads' }">Lists</router-link>
        </div>

        <div class = "mt-4 mr-4 pr-4 pl-4">
  <router-view />
        </div>


    </div>
</template>
