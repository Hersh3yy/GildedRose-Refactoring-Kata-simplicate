## Simplicate assigment

How to run using docker
- with a terminal, cd into the php directory
- run `docker build -t gilded-rose .`
- then `docker run -d --name gilded-rose-container -v $(pwd):/app gilded-rose` to run the container
- then `docker exec -it gilded-rose-container bash` to be able to interact with the container with your terminal
- run `composer run tests` to run the tests


Check the following pull request to see the diff of the work done for this assignemnt:
https://github.com/Hersh3yy/GildedRose-Refactoring-Kata-simplicate/pull/2














### Gilded Rose Refactoring Kata

You can find out more about this exercise in my YouTube video [Why Developers LOVE The Gilded Rose Kata](https://youtu.be/Mt4XpGxigT4).

I use this kata as part of my work as a technical coach. I wrote a lot about the coaching method I use in this book [Technical Agile Coaching with the Samman method](https://leanpub.com/techagilecoach). A while back I wrote this article ["Writing Good Tests for the Gilded Rose Kata"](http://coding-is-like-cooking.info/2013/03/writing-good-tests-for-the-gilded-rose-kata/) about how you could use this kata in a [coding dojo](https://leanpub.com/codingdojohandbook).




