# csv2github

> The script create CSV file for import issues to github from offer CSV.

Execute the command: `./csv2github.php /PATH/TO/file.csv`
or `php ./csv2github.php /PATH/TO/file.csv`.

Source file: Gizra's price offer example:
![selection_695](https://cloud.githubusercontent.com/assets/7760669/13634428/3eced6f0-e5fe-11e5-9b81-ffbc38f76dca.jpg)



Output file created in the same place as `filename_prepared.scv`.

Contains: 

Title with \[Est. time\], Desctiption and label.

## Export with [CSV-GitHub-import-export](https://github.com/Gizra/CSV-GitHub-import-export)

`git clone git@github.com:Gizra/CSV-GitHub-import-export.git`

`gem install octokit`

Execute the command: `./csv_issues_to_github.rb`

![selection_693](https://cloud.githubusercontent.com/assets/7760669/13634347/a565e6de-e5fd-11e5-84cc-8c06a8f98f87.jpg)

Exported issues (example):

![selection_694](https://cloud.githubusercontent.com/assets/7760669/13634344/9c1d9a7c-e5fd-11e5-9d7b-98cf58efa38f.jpg)
