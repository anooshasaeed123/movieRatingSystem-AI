# movieRatingSystem-AI
## Abtract

Textual data dominates our world from the tweets you read to the timeless writings of Seneca. And while we’re consuming images (looking at you Instagram) and videos at increasing rates, you still read Google search results multiple times per daily.

One frequently recurring problem with text data is Sentiment analysis (classification). Imagine you’re a big sugar + water beverage company. You want to know what people think of your products. You’ll search for texts with some tags, logos or names. You can then use Sentiment analysis to figure out if the opinions are positive or negative.

## Dealing with text
Computers don’t understand text data, though they do well with numbers. Natural Language Processing (NLP) offers a set of approaches to solve text-related problems and represent text as numbers. While NLP is a vast field, I used some simple preprocessing techniques and Bag of Words model.
Here are the most common words in the training dataset reviews:

![words](https://j76cva.dm.files.1drv.com/y4m4Bho1wk0fllXyjOvzTNQa4NlUFjlIgmF0JMCswli0DzgB6bIGEdzPRVWdpRd6LZOXqaWFbxh7glRlmdlns_WDbpWv52ej8ijZfpC1SUONmUQmZKlQr-TwacPb2_zMzyIq6XAg-BsAFSXuNncrCi7uBk9lYO7dReeu4-XlxYkrU70AT9P5kan-6x0mqdole1CEFIVeS5QnWZe4WjEVEbHcg?width=836&height=438&cropmode=none)
## Text Preprocessing:
Here is a checklist to use to clean your data:
- Begin by removing the html tags
- Remove any punctuations or limited set of special characters like , or . or # etc.
- Check if the word is made up of english letters and is not alpha-numeric
- Check to see if the length of the word is greater than 2 (as it was researched that there is no adjective in 2-letters)
- Convert the word to lowercase
- Remove Stopwords example:( the,and,a ….)
After following these steps and checking for additional errors, we can start using the clean, labelled data to train models!

## Before
![words](https://j76bva.dm.files.1drv.com/y4mQnT25WREPkstGWuaeL_x1nNDex32XJzlpGZJFjuZyv0gXSmI79sP_r2JW1DRo75-sUWf829K0PKPtRCXC-ByDwR9vEh1A5K28v1GmKxnIAio3iM2xZpdso5tTBPRH7z9mwEzkaRFKZSw5nnO2UIML-e8GvPnKxcBBIE2dIfx3-kpBpV9sblXzb8rqoIXFpp6funEfsI_8GN-UApGqIABwQ?width=762&height=333&cropmode=none)
## After
![words](https://j76eva.dm.files.1drv.com/y4m12ksqo_umg_kJqFgptQsyhSPgk8crk7US_S8zeiBMktkChng-XGvfTD7IUv3RPkfvwx038tzIto_BdBor0Dhb4nsOUtUaoSeRUXzBFyFWSWlSwwOhGUC9Ad99--WKAD9EF1VJoEJb4SJJEV00VXt-kzPlz7MwYpL87Ytqp-miAbOWiDxi_rd18SbtLyKwvGnoXd-pVqgsb8FkXCQhSzUvA?width=654&height=329&cropmode=none)

## Naive Bayes
Naive Bayes models are probabilistic classifiers that use the Bayes theorem and make a strong assumption that the features of the data are independent. For our case, this means that each word is independent of others.

Intuitively, this might sound like a dumb idea. You know that (even from reading) the prev word(s) influence the current and next ones. However, the assumption simplifies the math and works really well in practice!

The Bayes theorem is defined as:

P(A|B) = \frac{P(B|A)P(A)}{P(B)}
P(A∣B)= 
P(B)
P(B∣A)P(A)
​	
 
where AA and BB are some events and P(.)P(.) is a probability.

This equation gives us the conditional probability of event AA occurring given BB has happened. In order to find this, we need to calculate the probability of BB happening given AA has happened and multiply that by the probability of AA (known as Prior) happening. All of this is divided by the probability of BB happening on its own.

## Images-Front-End

![login](https://jr6iva.dm.files.1drv.com/y4mWtTWPYF3DxiHoX0xTOvt12UnBwfuuYI-ZTwKIUydcSwZ2gTkmGgUIC0kqmTTbJsc8yGN2mrkNvzCcunay8l9dxkw9hQjHffzLuODEHgvfMl-h1jR7MHM-l-4WxPoI49qjmxnu6XZnRfd3pxt07Bcpti2ViS4YB1OTHhklwBI2T6-nS_Jkkjz8sDp7i5jKDZAkofGcaWy2f4L82AmFHfHcA?width=2201&height=1309&cropmode=none)

![login](https://jr6hva.dm.files.1drv.com/y4mt8sK85nOtaDH2yQKyY9hGcieZgkeNJ_dGFP-QFQVbtUxnxvBxVRm-XUHYngk2hQfJBPB_jarmKYyfO4b2kovuVXyJBLD9KP_NARXOQfjMBzAnvc_IjazhErtGSWWwDtoGyKr8bpvlXymxFhVWla5Lrr8Q0HcBtAo3jInLyJccHheFmgh3dilHffcdhmuZKxrPNd0jdGUP8YtzoG7EI2Wgw?width=2148&height=1313&cropmode=none)

![home](https://jr6kva.dm.files.1drv.com/y4mEx45D1P75xKfprNlfFQH1kHe-RbUQa7bXv9sxcmoc030XG62oai1rOWW98F3y4o5vJopyHfd7SLxChxaUH9SuR5wOTIK99MAoIwWPwfJEMg8aJsTfmqcz69wHe7XAz8V9EaG0kzmfvsb5dnUiA_ddzNIwcu2D9ih2vKlGn1OjNdw5UHjRDyHD1oKQpUXZ6X8mNQ2wYTDx6Ai6nwn4S0vkw?width=1816&height=1337&cropmode=none)

