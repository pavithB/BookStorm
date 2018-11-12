-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2018 at 10:07 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstorm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `adminID` int(10) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `adminID`, `firstname`, `lastname`) VALUES
('admin', 'admin', 1, 'Pavith', 'Buddhima');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookID` int(10) NOT NULL,
  `bookTitle` varchar(100) NOT NULL,
  `bookDescription` varchar(1000) NOT NULL,
  `bookCover` varchar(100) NOT NULL,
  `bookPrice` double NOT NULL,
  `author` varchar(100) NOT NULL,
  `rating` int(10) NOT NULL,
  `categoryID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookID`, `bookTitle`, `bookDescription`, `bookCover`, `bookPrice`, `author`, `rating`, `categoryID`) VALUES
(1, 'Rock What Ya Got', 'A child reminds everyone to embrace their own special something in this joyful expression of self-love.\r\n\r\nWhen a drawing of a little girl comes to life, she boldly declares that she doesn''t want to be erased, or put into a picture that doesn''t feel like her true self. Instead, she decides to speak up in a powerful way. And she has some words of advice: embrace what you have, love yourself, and "rock what ya got." \r\n\r\nIn this affirmation of self-identity and girl power, a child''s memorable mantra offers a timeless lesson, reminding readers of all ages, backgrounds, and abilities that it''s okay to be yourself. Bold illustrations from Kerascoët (Malala''s Magic Pencil) bring the engaging story to life. ', '', 12.75, ' Samantha Berger', 2, 1),
(2, 'How Do We Look: The Body, the Divine, and the Question of Civilization', 'Conceived as a gorgeously illustrated accompaniment to “How Do We Look” and “The Eye of Faith,” the famed Civilisations shows on PBS, renowned classicist Mary Beard has created this elegant volume on how we have looked at art. Focusing in Part I on the Olmec heads of early Mesoamerica, the colossal statues of the pharaoh Amenhotep III, and the nudes of classical Greece, Beard explores the power, hierarchy, and gender politics of the art of the ancient world, and explains how it came to define the so-called civilized world. In Part II, Beard chronicles some of the most breathtaking religious imagery ever made—whether at Angkor Wat, Ravenna, Venice, or in the art of Jewish and Islamic calligraphers— to show how all religions, ancient and modern, have faced irreconcilable problems in trying to picture the divine. With this classic volume, Beard redefines the Western-and male-centric legacies of Ernst Gombrich and Kenneth Clark.', '', 10.5, 'Mary Beard', 3, 1),
(3, 'Upgrade Soul', 'For their 45th anniversary, Hank and Molly Nonnar decide to undergo an experimental rejuvenation procedure, but their hopes for youth are dashed when the couple is faced with the results: severely disfigured yet intellectually and physically superior duplicates of themselves. Can the original Hank and Molly coexist in the same world as their clones? \r\n\r\nIn Upgrade Soul, McDuffie Award-winning creator Ezra Claytan Daniels asks probing questions about what shapes our identity-Is it the capability of our minds or the physicality of our bodies? Is a newer, better version of yourself still you? This page-turning graphic novel follows the lives of Hank and Molly as they discover the harsh truth that only one version of themselves is fated to survive.', '', 15, 'Ezra Claytan Daniels', 4, 1),
(4, 'Hey, Kiddo', 'Hey, Kiddo is the graphic memoir of author-illustrator Jarrett J. Krosoczka. Raised by his colorful grandparents, who adopted him because his mother was an incarcerated heroin addict, Krosoczka didn''t know his father''s name until he saw his birth certificate when registering for a school ski trip. Hey, Kiddo traces Krosoczka''s search for his father, his difficult interactions with his mother, his day-to-day life with his grandparents, and his path to becoming an artist. \r\n\r\nTo date, nearly one million people have viewed Krosoczka''s TED Talk about his experience. Artwork from his childhood and teen years will be incorporated into the original illustrations for the book.', '', 12.25, 'Jarrett J. Krosoczka', 3, 1),
(5, 'The Collector’s Apprentice', 'It’s the summer of 1922, and nineteen-year-old Paulien Mertens finds herself in Paris—broke, disowned, and completely alone. Everyone in Belgium, including her own family, believes she stole millions in a sophisticated con game perpetrated by her then-fiancé, George Everard. To protect herself from the law and the wrath of those who lost everything, she creates a new identity, a Frenchwoman named Vivienne Gregsby, and sets out to recover her father’s art collection, prove her innocence—and exact revenge on George.\r\n\r\nB. A. Shapiro has made the historical art thriller her own. In The Collector’s Apprentice, she gives us an unforgettable tale about the lengths to which people will go for their obsession, whether it be art, money, love, or vengeance.', '', 25, 'B.A. Shapiro', 4, 1),
(6, 'Just Add Glitter', 'Is there really such a thing as too much bling? Find out in this sparkly homage to imagination and creativity gone wild that’s perfect for even the youngest fashion and crafting enthusiasts!\r\n\r\nHas the rainy day got you down?\r\nNot feeling fancy in your gown?\r\n\r\nJust add glitter!\r\n\r\nIt all starts with a mysterious mail delivery, a little girl with a big imagination, and a sprinkling of twinkling glitter. Before long there’s glitter here, glitter there—glitter, glitter EVERYWHERE! But just when she’s about to add more glitter, the little girl realizes maybe there is such a thing as too much bling when you and your best pal start to get lost in it…\r\n\r\nFrom beloved author Angela DiTerlizzi and illustrator Samantha Cotterill comes a silly and sweet story that celebrates imagination, creativity, and knowing when enough is enough—or is it?!', '', 16, 'Angela Diterlizzi', 2, 1),
(7, 'We Rise, We Resist, We Raise Our Voices', 'Fifty of the foremost diverse children''s authors and illustrators--including Jason Reynolds, Jacqueline Woodson, and Kwame Alexander--share answers to the question, "In this divisive world, what shall we tell our children?" in this beautiful, full-color keepsake collection, published in partnership with Just Us Books.\r\n\r\nFeaturing poems, letters, personal essays, art, and other works from such industry leaders as Jacqueline Woodson (Brown Girl Dreaming), Jason Reynolds (All American Boys), Kwame Alexander (The Crossover), Andrea Pippins (I Love My Hair), Sharon Draper (Out of My Mind), Rita Williams-Garcia (One Crazy Summer), Ellen Oh (cofounder of We Need Diverse Books), and artists Ekua Holmes, Rafael Lopez, James Ransome, Javaka Steptoe, and more, this anthology empowers the nation''s youth to listen, learn, and build a better tomorrow.', '', 20.5, 'Wade Hudson', 3, 1),
(8, 'No Fixed Address', 'From beloved Governor General Literary Award--winning author Susin Nielsen comes a touching and funny middle-grade story about family, friendship and growing up when you''re one step away from homelessness.\r\n\r\nFelix Knuttson, twelve, is an endearing kid with an incredible brain for trivia. His mom Astrid is loving but unreliable; she can''t hold onto a job, or a home. When they lose their apartment in Vancouver, they move into a camper van, just for August, till Astrid finds a job. September comes, they''re still in the van; Felix must keep "home" a secret and give a fake address in order to enroll in school. Luckily, he finds true friends. As the weeks pass and life becomes grim, he struggles not to let anyone know how precarious his situation is. When he gets to compete on a national quiz show, Felix is determined to win -- the cash prize will bring them a home. Their luck is about to change! But what happens is not at all what Felix expected.', '', 17, 'Susin Nielsen', 3, 1),
(9, 'Bibliophile: An Illustrated Miscellany', 'The ultimate gift for book lovers, this volume brims with literary treasures, all delightfully illustrated by beloved artist and founder of Ideal Bookshelf, Jane Mount. \r\nBook lovers, rejoice! In this love letter to all things bookish, Jane Mount brings literary people, places, and things to life through her signature and vibrant illustrations. Readers will:\r\n\r\n• Tour the world''s most beautiful bookstores\r\n• Test their knowledge of the written word with quizzes \r\n• Find their next great read in lovingly curated stacks of books\r\n• Sample the most famous fictional meals \r\n• Peek inside the workspaces of their favorite authors\r\nA source of endless inspiration, literary facts and recommendations, and pure bookish joy, Bibliophile is sure to enchant book clubbers, English majors, poetry devotees, inspiring writers, and any and all who identify as bookworms.', '', 25, 'Jane Mount', 5, 1),
(10, 'All You Can Ever Know: A Memoir', 'What does it mean to lose your roots—within your culture, within your family—and what happens when you find them?\r\n\r\nNicole Chung was born severely premature, placed for adoption by her Korean parents, and raised by a white family in a sheltered Oregon town. From early childhood, she heard the story of her adoption as a comforting, prepackaged myth. She believed that her biological parents had made the ultimate sacrifice in the hopes of giving her a better life; that forever feeling slightly out of place was simply her fate as a transracial adoptee. But as she grew up—facing prejudice her adoptive family couldn’t see, finding her identity as an Asian American and a writer, becoming ever more curious about where she came from—she wondered if the story she’d been told was the whole truth.', '', 30.25, 'Nicole Chung', 2, 2),
(11, 'Heavy: An American Memoir', 'In this powerful and provocative memoir, genre-bending essayist and novelist Kiese Laymon explores what the weight of a lifetime of secrets, lies, and deception does to a black body, a black family, and a nation teetering on the brink of moral collapse.\r\n\r\nA personal narrative that illuminates national failures, Heavy is defiant yet vulnerable, an insightful, often comical exploration of weight, identity, art, friendship, and family that begins with a confusing childhood—and continues through twenty-five years of haunting implosions and long reverberations. ', '', 16.75, 'Kiese Laymon', 3, 2),
(12, 'In the Hurricane''s Eye: The Genius of George Washington and the Victory at Yorktown', 'The thrilling story of the Revolutionary War finale from the New York Times bestselling author of In the Heart of the Sea and Valiant Ambition.\r\n\r\nIn the Battle of the Chesapeake (1781 - called the most important naval engagement in the history of the world), a French admiral foiled British attempts to rescue the army led by General Cornwallis. By making the subsequent victory at Yorktown a virtual inevitability, this naval battle--masterminded by Washington but waged without a single American ship--was largely responsible for the independence of the United States. A riveting and wide-ranging narrative, full of dramatic, unexpected turns, In the Hurricane''s Eye reveals that the fate of the American Revolution depended, in the end, on Washington and the sea.', '', 20.25, 'Nathaniel Philbrick', 4, 2),
(13, 'Presidents of War: The Epic Story, from 1807 to Modern Times', 'From a preeminent presidential historian comes a groundbreaking and often surprising narrative of America’s wartime chief executives\r\n\r\nBeschloss’s interviews with surviving participants in the drama and his discoveries in original letters, diaries, once-classified national security documents, and other sources help him to tell this story in a way it has not been told before. Presidents of War combines the sense of being there with the overarching context of two centuries of American history. This important book shows how far we have traveled from the time of our Founders, who tried to constrain presidential power, to our modern day, when a single leader has the potential to launch nuclear weapons that can destroy much of the human race.', '', 20.5, 'Michael R. Beschloss', 3, 2),
(14, 'Thirst: A Story of Redemption, Compassion, and a Mission to Bring Clean Water to the World', 'An inspiring personal story of redemption, second chances, and the transformative power within us all, from the founder and CEO of the nonprofit charity: water.\r\n\r\nAt 28 years old, Scott Harrison had it all. A top nightclub promoter in New York City, his life was an endless cycle of drugs, booze, models--repeat. But 10 years in, desperately unhappy and morally bankrupt, he asked himself, "What would the exact opposite of my life look like?" Walking away from everything, Harrison spent the next 16 months on a hospital ship in West Africa and discovered his true calling. In 2006, with no money and less than no experience, Harrison founded charity: water. Today, his organization has raised over $300 million to bring clean drinking water to more than 8.2 million people around the globe.\r\n\r\n100% of the author''s net proceeds from Thirst will go to fund charity: water projects around the world.', '', 30.25, 'Scott Harrison', 4, 2),
(15, 'Belonging: A German Reckons with History and Home', 'A revelatory, visually stunning graphic memoir by award-winning artist Nora Krug, telling the story of her attempt to confront the hidden truths of her family’s wartime past in Nazi Germany and to comprehend the forces that have shaped her life, her generation, and history.\r\n\r\nBelonging wrestles with the idea of Heimat, the German word for the place that first forms us, where the sensibilities and identity of one generation pass on to the next. In this highly inventive visual memoir—equal parts graphic novel, family scrapbook, and investigative narrative—Nora Krug draws on letters, archival material, flea market finds, and photographs to attempt to understand what it means to belong to one’s country and one’s family. A wholly original record of a German woman’s struggle with the weight of catastrophic history, Belonging is also a reflection on the responsibility that we all have as inheritors of our countries’ pasts.', '', 16.75, 'Nora Krug', 2, 2),
(16, 'There Will Be No Miracles Here: A Memoir', 'The testament of a boy and a generation who came of age as the world came apart--a generation searching for a new way to live.\r\n\r\nThere Will Be No Miracles Here has the arc of a classic rags-to-riches tale, but it stands the American Dream narrative on its head. If to live as we are is destroying us, it asks, what would it mean to truly live? Intense, incantatory, shot through with sly humor and quiet fury, There Will Be No Miracles Here inspires us to question--even shatter--and reimagine our most cherished myths.', '', 30.5, 'Casey Gerald', 2, 2),
(17, 'Dry', 'The drought—or the Tap-Out, as everyone calls it—has been going on for a while now. Everyone’s lives have become an endless list of don’ts: don’t water the lawn, don’t fill up your pool, don’t take long showers.\r\n\r\nUntil the taps run dry.\r\n\r\nSuddenly, Alyssa’s quiet suburban street spirals into a warzone of desperation; neighbours and families turned against each other on the hunt for water. And when her parents don’t return and her life—and the life of her brother—is threatened, Alyssa has to make impossible choices if she’s going to survive.', '', 50.25, 'Neal Shusterman', 4, 4),
(18, 'The Reckoning', 'Pete Banning was Clanton, Mississippi''s favorite son--a decorated World War II hero, the patriarch of a prominent family, a farmer, father, neighbor, and a faithful member of the Methodist church. Then one cool October morning he rose early, drove into town, walked into the church, and calmly shot and killed his pastor and friend, the Reverend Dexter Bell. As if the murder weren''t shocking enough, it was even more baffling that Pete''s only statement about it--to the sheriff, to his lawyers, to the judge, to the jury, and to his family--was: "I have nothing to say." He was not afraid of death and was willing to take his motive to the grave.\r\n\r\nReminiscent of the finest tradition of Southern Gothic storytelling, The Reckoning would not be complete without Grisham''s signature layers of legal suspense, and he delivers on every page.', '', 25, 'John Grisham', 3, 4),
(19, 'The Witch of Willow Hall', 'Two centuries after the Salem witch trials, there’s still one witch left in Massachusetts. But she doesn’t even know it.\r\n\r\nTake this as a warning: if you are not able or willing to control yourself, it will not only be you who suffers the consequences but those around you, as well.\r\n\r\nNew Oldbury, 1821 \r\n\r\nIn the wake of a scandal, the Montrose family and their three daughters—Catherine, Lydia, and Emeline—flee Boston for their new country home, Willow Hall. The estate seems sleepy and idyllic. But a subtle menace creeps into the atmosphere, remnants of a dark history that call to Lydia, and to the youngest, Emeline.\r\n\r\nAll three daughters will be irrevocably changed by what follows, but none more than Lydia, who must draw on a power she never knew she possessed if she wants to protect those she loves. For Willow Hall’s secrets will rise, in the end…', '', 22, 'Hester Fox', 4, 4),
(20, 'The Proposal', 'When freelance writer Nikole Paterson goes to a Dodgers game with her actor boyfriend, his man bun, and his bros, the last thing she expects is a scoreboard proposal. Saying no isn''t the hard part--they''ve only been dating for five months, and he can''t even spell her name correctly. The hard part is having to face a stadium full of disappointed fans...\r\n\r\nAt the game with his sister, Carlos Ibarra comes to Nik''s rescue and rushes her away from a camera crew. He''s even there for her when the video goes viral and Nik''s social media blows up--in a bad way. Nik knows that in the wilds of LA, a handsome doctor like Carlos can''t be looking for anything serious, so she embarks on an epic rebound with him, filled with food, fun, and fantastic sex. But when their glorified hookups start breaking the rules, one of them has to be smart enough to put on the brakes...', '', 30.25, 'Jasmine Guillory', 3, 4),
(21, 'The Boneless Mercies', 'A dark standalone YA fantasy about a band of mercenary girls in search of female glory.\r\n\r\nFrey, Ovie, Juniper, and Runa are the Boneless Mercies—girls hired to kill quickly, quietly, and mercifully. But Frey is weary of the death trade and, having been raised on the heroic sagas of her people, dreams of a bigger life. \r\n\r\nWhen she hears of an unstoppable monster ravaging a nearby town, Frey decides this is the Mercies'' one chance out. The fame and fortune of bringing down such a beast would ensure a new future for all the Mercies. In fact, her actions may change the story arc of women everywhere.', '', 20.75, 'April Genevieve Tucholke', 4, 4),
(22, 'Blanca & Roja', 'The biggest lie of all is the story you think you already know.\r\n\r\nThe del Cisne girls have never just been sisters; they’re also rivals, Blanca as obedient and graceful as Roja is vicious and manipulative. They know that, because of a generations-old spell, their family is bound to a bevy of swans deep in the woods. They know that, one day, the swans will pull them into a dangerous game that will leave one of them a girl, and trap the other in the body of a swan.\r\n\r\nBut when two local boys become drawn into the game, the swans’ spell intertwines with the strange and unpredictable magic lacing the woods, and all four of their fates depend on facing truths that could either save or destroy them. Blanca & Roja is the captivating story of sisters, friendship, love, hatred, and the price we pay to protect our hearts.', '', 30.5, 'Anna-Marie McLemore', 5, 4),
(23, 'Elevation', 'The latest from legendary master storyteller Stephen King, a riveting, extraordinarily eerie, and moving story about a man whose mysterious affliction brings a small town together—a timely, upbeat tale about finding common ground despite deep-rooted differences.\r\n\r\nAlthough Scott Carey doesn’t look any different, he’s been steadily losing weight. There are a couple of other odd things, too. He weighs the same in his clothes and out of them, no matter how heavy they are. Scott doesn’t want to be poked and prodded. He mostly just wants someone else to know, and he trusts Doctor Bob Ellis.', '', 40.25, 'Stephen King ', 4, 4),
(24, 'Family Trust', 'Meet Stanley Huang: father, husband, ex-husband, man of unpredictable tastes and temper, aficionado of all-inclusive vacations and bargain luxury goods, newly diagnosed with pancreatic cancer. For years, Stanley has claimed that he’s worth a small fortune. But the time is now coming when the details of his estate will finally be revealed, and Stanley’s family is nervous.\r\n\r\nA compelling tale of cultural expectations, career ambitions and our relationships with the people who know us best, Family Trust skewers the ambition and desires that drive Silicon Valley and draws a sharply loving portrait of modern American family life.', '', 20, 'Kathy Wang', 4, 4),
(25, 'Dark Harmony', 'For Callypso Lillis, the fae magic that now runs through her veins is equal parts curse and good fortune. For the very thing that bonds her to Desmond Flynn, the King of the Night, also makes her vulnerable to the Thief of Souls, a man who wants to break the world … and Callie along with it. \r\n\r\nBut it’s not just the Thief whose shadow looms over the Otherworld. Des’s father is back from the dead, and he wants revenge on the son who sent him to the grave in the first place. \r\n\r\nDes and Callie must figure out how to stop both men, and time is running out. Because there are forces at play working to tear the lovers apart once and for all … and unfortunately for them, death is no longer the worst thing to fear.', '', 12.25, 'Laura Thalassa', 5, 4),
(26, 'When We Caught Fire', 'It’s 1871 and Emmeline Carter is poised to take Chicago’s high society by storm. Between her father’s sudden rise to wealth, and her recent engagement to Chicago’s most eligible bachelor, Emmeline has it all. But she can’t stop thinking about the life she left behind, including her childhood sweetheart, Anders Magnuson. Fiona Byrne, Emmeline’s childhood best friend, is delighted by her friend’s sudden rise to prominence, especially since it means Fiona is free to pursue Anders herself. But when Emmeline risks everything for one final fling with Anders, Fiona feels completely betrayed.\r\n\r\nAs the summer turns to fall, the city is at a tipping point: friendships are tested, hearts are broken, and the tiniest spark might set everything ablaze. Sweeping, soapy, and romantic, this is a story about an epic love triangle—one that will literally set the city ablaze, and change the lives of three childhood friends forever.', '', 26.45, 'Anna Godbersen', 3, 4),
(27, 'The Spite Game', 'Everyone does bad things when no one is watching\r\n\r\nMercilessly bullied in high school, Ava knows she needs to put the past behind her and move on, but she can’t—not until she’s exacted precise, catastrophic revenge on the people who hurt her the most.\r\n\r\nFirst, she watches Saanvi. Flawlessly chic and working hard at a top architectural firm, Saanvi has it all together on the surface. But everyone does bad things when they think no one is watching and Ava only wants what’s fair—to destroy Saanvi’s life the way her own was destroyed.\r\n\r\nNext, she watches Cass. She’s there as Cass tries on wedding dresses, she’s there when Cass picks out a cake, she’s there when Cass betrays her fiancé. She’s the reason Cass’s entire future comes crashing down. \r\n\r\nFinally, Ava watches Mel. Mel was always the ringleader and if anyone has to pay, it’s her. But one tiny slipup and Ava realizes the truth: Mel knows she’s being watched, and she’s ready to play Ava’s games to the bitter end.', '', 42, 'Anna Snoekstra', 4, 4),
(28, 'In the House in the Dark of the Woods', 'In this horror story set in colonial New England, a law-abiding Puritan woman goes missing. Or perhaps she has fled or abandoned her family. Or perhaps she''s been kidnapped, and set loose to wander in the dense woods of the north. Alone and possibly lost, she meets another woman in the forest. Then everything changes.\r\n\r\nOn a journey that will take her through dark woods full of almost-human wolves, through a deep well wet with the screams of men, and on a living ship made of human bones, our heroine may find that the evil she flees has been inside her all along. The eerie, disturbing story of one of our perennial fascinations--witchcraft in colonial America--In the House in the Dark of the Woods is a novel of psychological horror and suspense told in Laird Hunt''s characteristically lyrical prose style. It is the story of a bewitching, a betrayal, a master huntress and her quarry. It is a story of anger, of evil, of hatred and of redemption. It is the story of a haunting, a story that ', '', 40.25, 'Laird Hunt', 4, 11),
(29, 'Pulse', 'Boston, 1976. In a small apartment above Kenmore Square, sixteen-year-old Daniel Fitzsimmons is listening to his landlord describe a seemingly insane theory about invisible pulses of light and energy that can be harnessed by the human mind. He longs to laugh with his brother Harry about it, but Harry doesn''t know he''s there\r\n\r\nDetectives "Bark" Jones and Tommy Dillon are assigned to the case. The veteran partners thought they''d seen it all, but they are stunned when Daniel wanders into the crime scene. Even stranger, Daniel claims to have known the details of his brother''s murder before it ever happened. The subsequent investigation leads the detectives deep into the Fitzsimmons brothers'' past. They find heartbreaking loss, sordid characters, and metaphysical conspiracies. Even on the rough streets of 1970s Boston, Jones and Dillon have never had a case like this.', '', 26.3, 'Michael Harvey', 4, 4),
(30, 'www', 'wwww', 'default.jpg', 0, 'wwww', 0, 7),
(31, 'er', 'er', 'default.jpg', 0, 'er', 0, 9),
(32, 'dddd', 'dddd', 'default.jpg', 25.5, 'dddd', 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(10) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `categoryDescription` varchar(2000) NOT NULL,
  `categoryCover` varchar(100) DEFAULT NULL,
  `categoryBookCount` int(10) NOT NULL DEFAULT '0',
  `categoryViewCount` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`, `categoryDescription`, `categoryCover`, `categoryBookCount`, `categoryViewCount`) VALUES
(1, 'Art', 'Books that showcase particular types of art.', NULL, 0, 0),
(2, 'Biography', 'A biography (from the Greek words bios meaning "life", and graphos meaning "write") is an account of a person''s life, usually published in the form of a book or essay, or in some other form, such as a film.', NULL, 0, 0),
(4, 'Fiction', 'Fiction is the telling of stories which are not real. More specifically, fiction is an imaginative form of narrative, one of the four basic rhetorical modes. Although the word fiction is derived from the Latin fingo, fingere, finxi, fictum, "to form, create", works of fiction need not be entirely imaginary and may include real people, places, and events. Fiction may be either written or oral. Although not all fiction is necessarily artistic, fiction is largely perceived as a form of art or entertainment. The ability to create fiction and other artistic works is considered to be a fundamental aspect of human culture, one of the defining characteristics of humanity.', NULL, 0, 0),
(5, 'Comics', 'A comic book or comicbook, also called comic magazine or simply comic, is a publication that consists of comic art in the form of sequential juxtaposed panels that represent individual scenes. Panels are often accompanied by brief descriptive prose and written narrative, usually dialog contained in word balloons emblematic of the comics art form.', NULL, 0, 0),
(6, 'Classics', 'A classic stands the test of time. The work is usually considered to be a representation of the period in which it was written; and the work merits lasting recognition. In other words, if the book was published in the recent past, the work is not a classic. \r\n\r\nA classic has a certain universal appeal. Great works of literature touch us to our very core beings--partly because they integrate themes that are understood by readers from a wide range of backgrounds and levels of experience. Themes of love, hate, death, life, and faith touch upon some of our most basic emotional responses. \r\n\r\nAlthough the term is often associated with the Western canon, it can be applied to works of literature from all traditions, such as the Chinese classics or the Indian Vedas.', NULL, 0, 0),
(7, 'Crime', 'The crime genre includes the broad selection of books on criminals and the court system, but the most common focus is investigations and sleuthing. Mystery novels are usually placed into this category, although there is a separate division for "crime". Hard Case Crime is one example.', NULL, 0, 0),
(8, 'Mystery', 'Mystery fiction is a loosely-defined term that is often used as a synonym of detective fiction — in other words a novel or short story in which a detective (either professional or amateur) solves a crime. The term "mystery fiction" may sometimes be limited to the subset of detective stories in which the emphasis is on the puzzle element and its logical solution (cf. whodunit), as a contrast to hardboiled detective stories which focus on action and gritty realism. However, in more general usage "mystery" may be used to describe any form of crime fiction, even if there is no mystery to be solved. For example, the Mystery Writers of America describes itself as "the premier organization for mystery writers, professionals allied to the crime writing field, aspiring crime writers, and those who are devoted to the genre".\r\n\r\nAlthough normally associated with the crime genre, the term "mystery fiction" may in certain situations refer to a completely different genre, where the focus is on supernatural mystery (even if no crime is involved). This usage was common in the pulp magazines of the 1930s and 1940s, where titles such as Dime Mystery, Thrilling Mystery and Spicy Mystery offered what at the time were described as "weird menace" stories – supernatural horror in the vein of Grand Guignol. This contrasted with parallel titles such as Dime Detective, Thrilling Detective and Spicy Detective, which contained conventional hardboiled crime fiction. The first use of "mystery" in this sense was by Dime Mystery, which started out as an ordinary crime fiction magazine but switched to "weird menace" during the latter part of 1933.', NULL, 0, 0),
(9, 'Fantasy', 'Fantasy is a genre that uses magic and other supernatural forms as a primary element of plot, theme, and/or setting. Fantasy is generally distinguished from science fiction and horror by the expectation that it steers clear of technological and macabre themes, respectively, though there is a great deal of overlap between the three (collectively known as speculative fiction or science fiction/fantasy)\r\n\r\nIn its broadest sense, fantasy comprises works by many writers, artists, filmmakers, and musicians, from ancient myths and legends to many recent works embraced by a wide audience today, including young adults, most of whom are represented by the works below.', NULL, 0, 0),
(10, 'Triller', 'Thrillers are characterized by fast pacing, frequent action, and resourceful heroes who must thwart the plans of more-powerful and better-equipped villains. Literary devices such as suspense, red herrings and cliffhangers are used extensively.\r\n\r\nThrillers often overlap with mystery stories, but are distinguished by the structure of their plots. In a thriller, the hero must thwart the plans of an enemy, rather than uncover a crime that has already happened. Thrillers also occur on a much grander scale: the crimes that must be prevented are serial or mass murder, terrorism, assassination, or the overthrow of governments. Jeopardy and violent confrontations are standard plot elements. While a mystery climaxes when the mystery is solved, a thriller climaxes when the hero finally defeats the villain, saving his own life and often the lives of others.', NULL, 0, 0),
(11, 'Horror', 'Horror fiction is fiction in any medium intended to scare, unsettle, or horrify the audience. Historically, the cause of the "horror" experience has often been the intrusion of a supernatural element into everyday human experience. Since the 1960s, any work of fiction with a morbid, gruesome, surreal, or exceptionally suspenseful or frightening theme has come to be called "horror". Horror fiction often overlaps science fiction or fantasy, all three of which categories are sometimes placed under the umbrella classification speculative fiction.', NULL, 0, 0),
(12, 'eeeeeeee', 'eeeeee', 'defaultCategory.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE `visit` (
  `visitID` int(10) NOT NULL,
  `userID` varchar(128) NOT NULL,
  `sessionID` varchar(128) NOT NULL,
  `bookID` int(10) NOT NULL,
  `timestamp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visit`
--

INSERT INTO `visit` (`visitID`, `userID`, `sessionID`, `bookID`, `timestamp`) VALUES
(1, '5be6aa679f841', 'f1tvs536sooasq6usj93o81iclfejbsh', 18, 1541847843),
(2, '5be6aa679f841', 'f1tvs536sooasq6usj93o81iclfejbsh', 18, 1541847846),
(3, '5be6aa679f841', 'f1tvs536sooasq6usj93o81iclfejbsh', 18, 1541847864),
(4, '5be6aa679f841', 'f1tvs536sooasq6usj93o81iclfejbsh', 18, 1541847866),
(5, '5be6aa679f841', 'f1tvs536sooasq6usj93o81iclfejbsh', 19, 1541847944),
(6, '5be6aa679f841', 'f1tvs536sooasq6usj93o81iclfejbsh', 23, 1541847955),
(7, '5be6aa679f841', 'f1tvs536sooasq6usj93o81iclfejbsh', 15, 1541847977),
(8, '5be6aa679f841', 'f1tvs536sooasq6usj93o81iclfejbsh', 11, 1541850853),
(9, '5be6d8948114a', '3hoc397e5tskpcfhvvv6lhucnc80ddle', 18, 1541855380),
(10, '5be6d8948114a', '3hoc397e5tskpcfhvvv6lhucnc80ddle', 10, 1541855437),
(11, '5be6d9078118f', '3a5m1l3m2hj7t3ugtngf6qoj20cfdrvj', 20, 1541855495),
(12, '5be6d9078118f', '3a5m1l3m2hj7t3ugtngf6qoj20cfdrvj', 15, 1541855504),
(13, '5be6d9078118f', '3a5m1l3m2hj7t3ugtngf6qoj20cfdrvj', 10, 1541855509),
(14, '5be6d9078118f', '3a5m1l3m2hj7t3ugtngf6qoj20cfdrvj', 18, 1541855539),
(15, '5be6aa679f841', 'f1tvs536sooasq6usj93o81iclfejbsh', 13, 1541860982),
(16, '5be6aa679f841', 'f1tvs536sooasq6usj93o81iclfejbsh', 24, 1541861036),
(17, '5be6aa679f841', 'f1tvs536sooasq6usj93o81iclfejbsh', 28, 1541861111),
(18, '5be6aa679f841', 'f1tvs536sooasq6usj93o81iclfejbsh', 28, 1541861295),
(19, '5be6efc3ea06f', 't8bgcspnhes7gmimvks492pq2n2iqrse', 28, 1541861315),
(20, '5be6efc3ea06f', 't8bgcspnhes7gmimvks492pq2n2iqrse', 26, 1541861348),
(21, '5be6aa679f841', 'kr09ggfs7bgsu29n4t3af1f0umtso17u', 19, 1541861768),
(22, '5be6aa679f841', 'fce0edddp38q8o3hur07v12275afom9n', 19, 1541862420),
(23, '5be6aa679f841', 'fce0edddp38q8o3hur07v12275afom9n', 19, 1541862492),
(24, '5be6aa679f841', '7d92em4cg5dljm9gb4lof8cl0hlqusi9', 19, 1541865052),
(25, '5be6aa679f841', '7d92em4cg5dljm9gb4lof8cl0hlqusi9', 18, 1541865067),
(26, '5be6aa679f841', '7d92em4cg5dljm9gb4lof8cl0hlqusi9', 12, 1541865087),
(27, '5be6fe9b18174', 'f4kcfkmrlgj4cdu6notfr38hbnes4ugn', 9, 1541865115),
(28, '5be6aa679f841', '7d92em4cg5dljm9gb4lof8cl0hlqusi9', 2, 1541865343),
(29, '5be6aa679f841', 'fokk3frvu05fh8hj0ghrsakr3l78eep4', 18, 1541865355),
(30, '5be6ffa971187', '584v1182kkjo43ljaq630prio5vqnvnr', 25, 1541865385),
(31, '5be6ffa971187', '584v1182kkjo43ljaq630prio5vqnvnr', 9, 1541865396),
(32, '5be6ffa971187', '584v1182kkjo43ljaq630prio5vqnvnr', 28, 1541865402),
(33, '5be6ffa971187', '584v1182kkjo43ljaq630prio5vqnvnr', 29, 1541865413),
(34, '5be6aa679f841', 'fokk3frvu05fh8hj0ghrsakr3l78eep4', 9, 1541865433),
(35, '5be6fff010b9a', 'uidne7num1k0mc2jfsijmgjuhccb8f0d', 9, 1541865456),
(36, '5be6fff010b9a', 'uidne7num1k0mc2jfsijmgjuhccb8f0d', 16, 1541865465),
(37, '5be6aa679f841', 'fokk3frvu05fh8hj0ghrsakr3l78eep4', 9, 1541865470),
(38, '5be6aa679f841', 'fokk3frvu05fh8hj0ghrsakr3l78eep4', 20, 1541865491),
(39, '5be6aa679f841', 'fokk3frvu05fh8hj0ghrsakr3l78eep4', 16, 1541865506),
(40, '5be6aa679f841', 'fokk3frvu05fh8hj0ghrsakr3l78eep4', 11, 1541865522),
(41, '5be6fff010b9a', 'uidne7num1k0mc2jfsijmgjuhccb8f0d', 16, 1541865530),
(42, '5be6aa679f841', 'fokk3frvu05fh8hj0ghrsakr3l78eep4', 16, 1541865548),
(43, '5be6aa679f841', '08uths4b3in38m5nn8d85fdm6cjca9fm', 19, 1541865755),
(44, '5be6aa679f841', 'hk2gbk671f5ctug5d2usv7mt1r9bam5s', 17, 1541877300),
(45, '5be6aa679f841', 'hk2gbk671f5ctug5d2usv7mt1r9bam5s', 19, 1541877307),
(46, '5be6aa679f841', 'hk2gbk671f5ctug5d2usv7mt1r9bam5s', 17, 1541877316),
(47, '5be6aa679f841', 'hk2gbk671f5ctug5d2usv7mt1r9bam5s', 17, 1541877324),
(48, '5be6aa679f841', 'hk2gbk671f5ctug5d2usv7mt1r9bam5s', 23, 1541877337),
(49, '5be74e7141304', 'pqanou0l0dm3k0q93i6uilpmn9sonevq', 11, 1541885553),
(50, '5be74e7141304', 'r5up7ddisuat9tm4fbfju3eeelsf2fav', 12, 1541891094),
(51, '5be74e7141304', 'oi5k6j87c279lbnvfj3k8u283f9dup8c', 11, 1541893089),
(52, '5be74e7141304', 'p40jokhc390ild7mm90m3hdsfho67m9j', 19, 1541894568),
(53, '5be74e7141304', '5tb4thngjptf3fs69tptqjnenrhcr2a3', 19, 1541894967),
(54, '5be74e7141304', '5tb4thngjptf3fs69tptqjnenrhcr2a3', 19, 1541895172),
(55, '5be74e7141304', '6gb9nr9e4f5bkrnmng6q3lcrp3l7uk9h', 19, 1541895369),
(56, '5be74e7141304', '6gb9nr9e4f5bkrnmng6q3lcrp3l7uk9h', 19, 1541895371),
(57, '5be74e7141304', '6gb9nr9e4f5bkrnmng6q3lcrp3l7uk9h', 19, 1541895372),
(58, '5be74e7141304', '6gb9nr9e4f5bkrnmng6q3lcrp3l7uk9h', 19, 1541895373),
(59, '5be74e7141304', '6gb9nr9e4f5bkrnmng6q3lcrp3l7uk9h', 19, 1541895517),
(60, '5be74e7141304', '6gb9nr9e4f5bkrnmng6q3lcrp3l7uk9h', 19, 1541895519),
(61, '5be74e7141304', '6gb9nr9e4f5bkrnmng6q3lcrp3l7uk9h', 19, 1541895591),
(62, '5be74e7141304', '6gb9nr9e4f5bkrnmng6q3lcrp3l7uk9h', 19, 1541895593),
(63, '5be74e7141304', '6gb9nr9e4f5bkrnmng6q3lcrp3l7uk9h', 19, 1541895595),
(64, '5be74e7141304', '6gb9nr9e4f5bkrnmng6q3lcrp3l7uk9h', 19, 1541895598),
(65, '5be74e7141304', '6gb9nr9e4f5bkrnmng6q3lcrp3l7uk9h', 19, 1541895601),
(66, '5be74e7141304', '6gb9nr9e4f5bkrnmng6q3lcrp3l7uk9h', 19, 1541895603),
(67, '5be74e7141304', '6gb9nr9e4f5bkrnmng6q3lcrp3l7uk9h', 19, 1541895608),
(68, '5be74e7141304', 'fbv81trn10dgekcsf7h0sflk6mevko84', 19, 1541895887),
(69, '5be74e7141304', 'fbv81trn10dgekcsf7h0sflk6mevko84', 19, 1541895889),
(70, '5be74e7141304', 'fbv81trn10dgekcsf7h0sflk6mevko84', 19, 1541895927),
(71, '5be74e7141304', '3ijmnik815mr39fhgvagtp6rci7ifk2j', 19, 1541898150),
(72, '5be74e7141304', '3ijmnik815mr39fhgvagtp6rci7ifk2j', 19, 1541898152),
(73, '5be7ed55a5120', 'ugq1nn8ufmsnskilek1rnsmrj8qpobaf', 22, 1541926229),
(74, '5be7ed55a5120', 'ugq1nn8ufmsnskilek1rnsmrj8qpobaf', 22, 1541926242),
(75, '5be7ed55a5120', 'ugq1nn8ufmsnskilek1rnsmrj8qpobaf', 23, 1541926250),
(76, '5be7ed55a5120', 'ugq1nn8ufmsnskilek1rnsmrj8qpobaf', 22, 1541926255),
(77, '5be7ed55a5120', 'ugq1nn8ufmsnskilek1rnsmrj8qpobaf', 24, 1541926269),
(78, '5be7ed55a5120', 'ugq1nn8ufmsnskilek1rnsmrj8qpobaf', 22, 1541926277),
(79, '5be7ed55a5120', 'ugq1nn8ufmsnskilek1rnsmrj8qpobaf', 20, 1541926313),
(80, '5be7ed55a5120', 'ugq1nn8ufmsnskilek1rnsmrj8qpobaf', 19, 1541926493),
(81, '5be7ed55a5120', 'ugq1nn8ufmsnskilek1rnsmrj8qpobaf', 24, 1541926498),
(82, '5be7ed55a5120', 'ugq1nn8ufmsnskilek1rnsmrj8qpobaf', 24, 1541926499),
(83, '5be7ed55a5120', 'ugq1nn8ufmsnskilek1rnsmrj8qpobaf', 24, 1541926501),
(84, '5be7ed55a5120', 'ugq1nn8ufmsnskilek1rnsmrj8qpobaf', 20, 1541936157),
(85, '5be7ed55a5120', 'ugq1nn8ufmsnskilek1rnsmrj8qpobaf', 20, 1541936160),
(86, '5be7ed55a5120', 'ugq1nn8ufmsnskilek1rnsmrj8qpobaf', 20, 1541936167),
(87, '5be7ed55a5120', 'ugq1nn8ufmsnskilek1rnsmrj8qpobaf', 20, 1541958267),
(88, '5be7ed55a5120', 'ugq1nn8ufmsnskilek1rnsmrj8qpobaf', 20, 1541958271),
(89, '5be7ed55a5120', 'ugq1nn8ufmsnskilek1rnsmrj8qpobaf', 20, 1541958276),
(90, '5be96901e270d', 'pbp4po34cbuu0m6q2652iemrbtmfti3o', 18, 1542023425),
(91, '5be96901e270d', 'pbp4po34cbuu0m6q2652iemrbtmfti3o', 19, 1542023599),
(92, '5be96901e270d', 'pbp4po34cbuu0m6q2652iemrbtmfti3o', 19, 1542023653),
(93, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542023660),
(94, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 13, 1542026822),
(95, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542028776),
(96, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 18, 1542028856),
(97, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 18, 1542028911),
(98, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542029895),
(99, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542030040),
(100, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542030065),
(101, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542030403),
(102, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542030509),
(103, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542030511),
(104, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542030530),
(105, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542030533),
(106, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542030535),
(107, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542030591),
(108, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542030716),
(109, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542030822),
(110, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542030878),
(111, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542030881),
(112, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 24, 1542030899),
(113, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 20, 1542030910),
(114, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 20, 1542030956),
(115, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 20, 1542031007),
(116, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 20, 1542031102),
(117, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 20, 1542031367),
(118, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 20, 1542031505),
(119, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 20, 1542031542),
(120, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 20, 1542031695),
(121, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 23, 1542031701),
(122, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542031708),
(123, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542031727),
(124, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542031751),
(125, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542031754),
(126, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542031808),
(127, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 30, 1542031836),
(128, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 30, 1542031844),
(129, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 32, 1542032040),
(130, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 32, 1542032058),
(131, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542032124),
(132, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542032323),
(133, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542032330),
(134, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542032367),
(135, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542032369),
(136, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542032375),
(137, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542032433),
(138, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542032435),
(139, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542032453),
(140, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542032523),
(141, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542033444),
(142, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542033499),
(143, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542033502),
(144, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542033551),
(145, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542033671),
(146, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542033673),
(147, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542033701),
(148, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542033757),
(149, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542033787),
(150, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542033799),
(151, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542033821),
(152, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542033825),
(153, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542033846),
(154, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542033849),
(155, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542033851),
(156, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542033894),
(157, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542033898),
(158, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542034067),
(159, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542034068),
(160, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542034069),
(161, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542034069),
(162, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542034070),
(163, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542034246),
(164, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542034413),
(165, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542034415),
(166, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542034432),
(167, '5be9938186fc5', 'f63sosiqf0p76uvv3qe5jsd36oklqidh', 19, 1542034463),
(168, '5be9938186fc5', 'f63sosiqf0p76uvv3qe5jsd36oklqidh', 19, 1542034470),
(169, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542034708),
(170, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 13, 1542035108),
(171, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 13, 1542035250),
(172, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 13, 1542035267),
(173, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 13, 1542035283),
(174, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 13, 1542035286),
(175, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 13, 1542035287),
(176, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 13, 1542035288),
(177, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 22, 1542035299),
(178, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 22, 1542035319),
(179, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 24, 1542035329),
(180, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 22, 1542035332),
(181, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 20, 1542035338),
(182, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 22, 1542035341),
(183, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 17, 1542035352),
(184, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542035360),
(185, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542035380),
(186, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542035381),
(187, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 19, 1542035382),
(188, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 21, 1542035387),
(189, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 21, 1542035392),
(190, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 21, 1542035509),
(191, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 24, 1542035518),
(192, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 28, 1542035527),
(193, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 31, 1542035546),
(194, '5be994516432d', '63qafk4cu78vvjnbukrfiagjd0mdc6k7', 19, 1542037349),
(195, '5be994516432d', '63qafk4cu78vvjnbukrfiagjd0mdc6k7', 19, 1542037353),
(196, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 21, 1542041976),
(197, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 28, 1542042119),
(198, '5be969ecb71b3', 'dfmu4o1qt61eibfsj9oheia5m44nefdt', 28, 1542042144);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`visitID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `visit`
--
ALTER TABLE `visit`
  MODIFY `visitID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `fk_categoryID` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
