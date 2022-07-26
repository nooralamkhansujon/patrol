// var lengthOfLongestSubstring = function (s) {
//     let longest_length = [];
//     let longest_array = [];
//     let s_array = s.split("");
//     console.log(s_array);
//     for (let j = 0; j < s_array.length; j++) {
//         longest_array[j] = [s_array[j]];
//         longest_length[j] = 1;
//         for (let i = j + 1; i < s_array.length; i++) {
//             if (
//                 longest_array[j].findIndex((item) => item === s_array[i]) > -1
//             ) {
//                 break;
//             } else {
//                 longest_array[j].push(s_array[i]);
//                 longest_length[j]++;
//             }
//         }
//     }
//     // longest_array.forEach((longSubString) => {
//     //     if (longSubString.length > longest_length) {
//     //         longest_length = longSubString.length;
//     //     }
//     // });
//     console.log([...longest_length]);
//     return Math.max(...longest_length);
// };
// console.log(lengthOfLongestSubstring("abcabcbb"));
// console.log(lengthOfLongestSubstring(""));

// var lengthOfLongestSubstring = function (s) {
//     let longest_length = [];
//     let longest_array = [];
//     let s_array = s.split("");
//     console.log(s_array);
//     for (let i = 0; i < s_array.length; i++) {
//         let array_index = longest_array.findIndex(
//             (item) => item === s_array[i]
//         );
//         console.log(longest_array);
//         if (array_index > -1) {
//             longest_array.splice(array_index, 1);
//         }
//         longest_array.push(s_array[i]);
//     }
//     // longest_array.forEach((longSubString) => {
//     //     if (longSubString.length > longest_length) {
//     //         longest_length = longSubString.length;
//     //     }
//     // });
//     console.log([...longest_length]);
//     return longest_array.length;
// };
// console.log(lengthOfLongestSubstring("abcabcbb"));
// console.log(lengthOfLongestSubstring(""));
// console.log(lengthOfLongestSubstring("pwwkew"));
