<template>
  <div class="parent">
    <h1>WEBORIGO</h1>
    <img :src="currentPair.image" alt="word image" />
    <p>{{ currentWord }}</p>
    <input v-model="userInput" @keyup.enter="checkAnswer" />
    <button @click="checkAnswer">Let's see</button>
  </div>
</template>

<script>
export default {
  name: "WordPairComponent",
  props: ["pair"],
  data() {
    return {
      currentPair: this.pair,
      userInput: "",
      currentWord: "",
      isEnglish: true,
    };
  },
  watch: {
    pair: {
      immediate: true,
      handler(newPair) {
        this.currentPair = newPair;
        this.isEnglish = Math.random() > 0.5;
        this.currentWord = this.isEnglish
          ? this.currentPair.english
          : this.currentPair.serbian;
        this.userInput = "";
      },
    },
  },
  methods: {
    checkAnswer() {
      this.$emit("check-answer", {
        pair: this.currentPair,
        userInput: this.userInput,
        isEnglish: this.isEnglish,
      });
      this.userInput = "";
    },
  },
};
</script>

<style scoped>
.parent {
  img {
    width: 500px;
  }
}
</style>
