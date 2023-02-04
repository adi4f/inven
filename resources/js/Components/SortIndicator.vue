<template>
    <div class="ml-2 flex">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" class="w-2 h-4" :class="sort_by == field && sort_dir == 'asc' ? 'fill-blue-700' : 'fill-gray-300'" viewBox="0 0 244.7 489.3">
        <path d="M119,468.85V50.05l73.6,73.6c2.4,2.4,5.5,3.6,8.7,3.6s6.3-1.2,8.7-3.6c4.8-4.8,4.8-12.5,0-17.3l-94.5-94.5c-4.6-4.6-12.7-4.6-17.3,0l-94.6,94.5c-4.8,4.8-4.8,12.5,0,17.3c4.8,4.8,12.5,4.8,17.3,0l73.6-73.6v418.8c0,6.8,5.5,12.3,12.3,12.3C113.5,481.05,119,475.55,119,468.85z"/>
      </svg>
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" class="w-2 h-4" :class="sort_by == field && sort_dir == 'desc' ? 'fill-blue-700' : 'fill-gray-300'" viewBox="244.7 0 244.7 489.3">
        <path d="M373.8,477.45c2.4,2.4,5.5,3.6,8.7,3.6s6.3-1.2,8.7-3.6l94.5-94.5c4.8-4.8,4.8-12.5,0-17.3s-12.5-4.8-17.3,0l-73.6,73.6V20.45c0-6.8-5.5-12.3-12.3-12.3s-12.3,5.5-12.3,12.3v418.8l-73.5-73.6c-4.8-4.8-12.5-4.8-17.3,0s-4.8,12.5,0,17.3L373.8,477.45z"/>
      </svg>
    </div>
  </template>
  
  <script>
  export default {
    props: ['field', 'sort_by', 'sort_dir']
  }
  </script>
  