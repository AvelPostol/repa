<template>
  <v-card>
    <v-toolbar color="primary">
      <v-app-bar-nav-icon></v-app-bar-nav-icon>

      <v-toolbar-title>Навигация</v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn icon>
        <v-icon>mdi-magnify</v-icon>
      </v-btn>

      <v-btn icon>
        <v-icon>mdi-dots-vertical</v-icon>
      </v-btn>

      <template v-slot:extension>
        <v-tabs
          v-model="model"
          centered
        >
          <v-tab
          v-for="(item, index) in navItem"
          :key="index"
          >
          {{ item.title }}
          </v-tab>
        </v-tabs>
      </template>
    </v-toolbar>

    <v-window v-model="model">
      <v-window-item
        v-for="i in 3"
        :key="i"
        :value="i"
      >
        <v-card>
          <v-card-text>{{ text }}</v-card-text>
        </v-card>
      </v-window-item>
    </v-window>
  </v-card>
</template>



<script>
import axios from 'axios';


export default {
  theme: {
  defaultTheme: 'light'
},

activeSlide: 0,
  data() {
    return {
      navItem: [
        {
          title: 'сделки',
        },
        {
          title: 'история сделки',
        },
      ],
    };
  },
  mounted() {
    // Вызываем метод fetchDataFromPHP при загрузке компонента
    this.fetchDataFromPHP();
  },
  methods: {
    fetchDataFromPHP() {
      axios.post('/get.php')
        .then(response => {
          // Обработка ответа от сервера
          console.log('Ответ от сервера:', response.data);
          
          // Здесь вы можете использовать переменную response.data, которая содержит данные, возвращенные из PHP
        })
        .catch(error => {
          console.error('Ошибка при отправке запроса:', error);
        });
    },
  },
}

</script>
