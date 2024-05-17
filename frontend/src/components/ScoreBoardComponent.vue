<template>
  <div>
    <p>Correct: {{ correct }}</p>
    <p>Incorrect: {{ incorrect }}</p>
  </div>
</template>

<script>
export default {
  name: "ScoreBoardComponent",
  props: ["correct", "incorrect"],
};
</script>

<style scoped>
div {
  display: flex;
  gap: 15px;
  justify-content: center;
}
</style>
