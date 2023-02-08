export const getRGBStyleValue = (red, green, blue) => {
  return `rgb(${red},${green},${blue})`;
};

export const getRandomRBGValue = () => {
  return Math.floor(Math.random() * 256);
};
