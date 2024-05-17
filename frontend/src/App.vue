<template>
  <div id="app">
    <WordPairComponent :pair="currentPair" @check-answer="handleAnswer" />
    <ScoreBoardComponent :correct="correct" :incorrect="incorrect" />
  </div>
</template>

<script>
import ScoreBoardComponent from "./components/ScoreBoardComponent.vue";
import WordPairComponent from "./components/WordPairComponent.vue";
import axios from "axios";

export default {
  data() {
    return {
      pairs: [],
      correct: 0,
      incorrect: 0,
      currentPair: {},
    };
  },
  created() {
    this.fetchWordPairs();
  },
  methods: {
    async fetchWordPairs() {
      try {
        const response = await axios.get("http://localhost:8000/api/wordPairs"); // Ensure this is the correct URL
        this.pairs = response.data;
        this.shufflePairs();
        this.currentPair = this.pairs[0];
      } catch (error) {
        console.error("There was an error fetching the word pairs:", error);
      }
    },
    shufflePairs() {
      this.pairs.sort(() => Math.random() - 0.5);
    },
    handleAnswer({ pair, userInput, isEnglish }) {
      const correctAnswer = isEnglish ? pair.serbian : pair.english;
      if (
        userInput.trim().toLowerCase() === correctAnswer.trim().toLowerCase()
      ) {
        this.correct++;
        this.pairs = this.pairs.filter((p) => p !== pair);
      } else {
        this.incorrect++;
      }

      if (this.pairs.length === 0) {
        this.resetGame();
      } else {
        this.currentPair = this.pairs[0];
      }
    },
    resetGame() {
      alert("Game Over! Starting again...");
      this.correct = 0;
      this.incorrect = 0;
      this.shufflePairs();
      this.currentPair = this.pairs[0];
    },
  },
  components: {
    ScoreBoardComponent,
    WordPairComponent,
  },
};
</script>

<style scoped>
#app {
  background: #ff6700;
  text-align: center;
  padding: 20px;
}
</style>
