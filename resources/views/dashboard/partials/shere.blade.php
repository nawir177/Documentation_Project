  <h1 class="text-2xl mb-5 font-extrabold text-teal-400 font-Secular">Shered with you</h1>
  <div class="overflow-x-auto relative shadow rounded-lg">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-slate-400 uppercase bg-white">
              <tr>
                  <th scope="col" class="py-3 px-6">
                      Document Name
                  </th>
                  <th scope="col" class="py-3 px-6">
                      Division
                  </th>
                  <th scope="col" class="py-3 px-6">
                      Category
                  </th>
                  <th scope="col" class="py-3 px-6">
                      Owner
                  </th>
              </tr>
          </thead>
          <tbody>
              @for ($i = 0; $i < 3; $i++)
                  <tr class="bg-white border-b text-gray-800">
                      <td class="py-4 px-6">
                          Document Name
                      </td>
                      <td class="py-4 px-6">
                          Division
                      </td>
                      <td class="py-4 px-6">
                          Category
                      </td>
                      <td class="py-4 px-6">
                          Name
                      </td>
                  </tr>
              @endfor
          </tbody>
      </table>
  </div>
