<section id="customizeRetro" class="pb-48">
  <header class="flex items-center justify-center pt-40 text-4xl font-semibold">Customize your gamepad</header>
  <div class="flex justify-center">
      <div class="h-full pt-20">
          <img src="assets/images/CustomControllerRetro.png" class="w-2xl">
      </div>

      <div class="flex flex-col pt-20 designSelection">
          <form class="flex flex-col">
              <label for="theme">Color/Theme:</label>
              <select name="theme" id="theme" class="p-2 text-xl dark:bg-gray-800">
                  <option value="Red">Red</option>
                  <option value="Blue">Blue</option>
                  <option value="Diamond">Diamond</option>
                  <option value="Damascus">Damascus</option>
              </select>

              <label for="backButtons">Back Buttons:</label>
              <select name="backButtons" id="backButtons" class="p-2 text-xl dark:bg-gray-800">
                  <option value="BackButtons">Back Buttons</option>
                  <option value="BackPaddles">Back Paddles</option>
                  <option value="None">None</option>
              </select>

              <label for="triggers">Triggers:</label>
              <select name="triggers" id="triggers" class="p-2 text-xl dark:bg-gray-800">
                  <option value="Mouse Click Triggers">Mouse Click Triggers</option>
                  <option value="Regular Triggers">Regular Triggers</option>
              </select>

              <label for="thumbGrip">Thumb Grip:</label>
              <select name="thumbGrip" id="thumbGrip" class="p-2 text-xl dark:bg-gray-800">
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
              </select>

              <div class="flex flex-row gap-3 pt-4 submitButtons"> 
                  <button type="submit" class="p-2 font-semibold bg-blue-800 rounded-lg cursor-pointer dark:bg-gradient-to-r dark:from-blue-900 dark:to-blue-800">Publish</button>
                  <button type="submit" class="p-2 font-semibold bg-blue-800 rounded-lg cursor-pointer dark:bg-gradient-to-r dark:from-blue-900 dark:to-blue-800">Place Order</button>
                  <button type="submit" class="p-2 font-semibold bg-blue-800 rounded-lg cursor-pointer dark:bg-gradient-to-r dark:from-blue-900 dark:to-blue-800">Save to Collection</button>
              </div>
          </form>
      </div>
  </div>
</section>


